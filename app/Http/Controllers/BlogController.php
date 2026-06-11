<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Public: Display all published blogs
    public function index()
    {
        $blogs = Blog::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->orderBy('sort_order')
            ->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    // Public: Display single blog post
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        $relatedBlogs = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        return view('blog.show', compact('blog', 'relatedBlogs'));
    }

    // Admin: Index with search and filtering
    public function adminIndex(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $blogs = $query->orderBy('published_at', 'desc')->orderBy('sort_order')->paginate(10);

        if ($request->ajax()) {
            return view('admin.blogs.partials.table', compact('blogs'))->render();
        }

        return view('admin.blogs.index', compact('blogs'));
    }

    // Admin: Create form
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Admin: Store new blog
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|string|max:500',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;

        Blog::create($validated);

        return redirect()->route('admin.blogs')->with('success', 'Blog post created successfully.');
    }

    // Admin: Show single blog
    public function adminShow($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    // Admin: Edit form
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    // Admin: Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|string|max:500',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;

        $blog->update($validated);

        return redirect()->route('admin.blogs')->with('success', 'Blog post updated successfully.');
    }

    // Admin: Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog post deleted successfully.');
    }

    // Admin: Toggle publish status
    public function togglePublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = !$blog->is_published;
        $blog->published_at = $blog->is_published ? ($blog->published_at ?? now()) : null;
        $blog->save();
        return response()->json(['success' => true, 'is_published' => $blog->is_published]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Destination;
use App\Models\TeamMember;
use App\Models\Inquiry;
use App\Models\Blog;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function services()
    {
        $services = Service::active()->get()->groupBy('category');
        $featured = Service::active()->featured()->get();
        return view('pages.services', compact('services', 'featured'));
    }

    public function destinations(Request $request)
    {
        $region = $request->query('region', 'all');
        $query  = Destination::active();
        if ($region !== 'all') {
            $query->byRegion($region);
        }
        $destinations = $query->get();
        $regions      = Destination::active()->distinct()->pluck('region')->sort()->values();
        $popular      = Destination::active()->popular()->get();
        return view('pages.destinations', compact('destinations', 'regions', 'region', 'popular'));
    }

    public function about()
    {
        $team = TeamMember::active()->get();
        return view('pages.about', compact('team'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function side1Index()
    {
        $values = [
            ['icon'=>'bi-shield-fill-check','color'=>'#c9993a','bg'=>'rgba(201,153,58,0.1)','title'=>'Integrity','desc'=>'We operate with complete honesty, transparency, and ethical standards in every client engagement.'],
            ['icon'=>'bi-lightbulb-fill','color'=>'#e8b84b','bg'=>'rgba(232,184,75,0.1)','title'=>'Innovation','desc'=>'We bring creative, forward-thinking solutions to complex legal, research, and organizational challenges.'],
            ['icon'=>'bi-handshake-fill','color'=>'#c9993a','bg'=>'rgba(201,153,58,0.1)','title'=>'Collaboration','desc'=>'We work as true partners with our clients, ensuring their goals become our shared mission.'],
            ['icon'=>'bi-award-fill','color'=>'#e8b84b','bg'=>'rgba(232,184,75,0.1)','title'=>'Excellence','desc'=>'We deliver superior quality in every service, from documentation to representation and advisory.'],
        ];

        $legal = [
            ['icon'=>'bi-airplane','color'=>'#c9993a','title'=>'Aviation Law','desc'=>'Regulatory compliance, aircraft registration, leasing agreements, and aviation industry legal advisory.'],
            ['icon'=>'bi-bank2','color'=>'#e8b84b','title'=>'Banking, Finance & Capital Markets','desc'=>'Banking regulations, securities, capital markets, financial transactions, and investment advisory services.'],
            ['icon'=>'bi-building','color'=>'#c9993a','title'=>'Corporate & Commercial Law','desc'=>'Company formation, mergers & acquisitions, corporate governance, and commercial contract drafting.'],
            ['icon'=>'bi-hammer','color'=>'#e8b84b','title'=>'Litigation','desc'=>'Civil and commercial litigation, dispute resolution, court representation, and legal advocacy.'],
            ['icon'=>'bi-gem','color'=>'#c9993a','title'=>'Mining Laws','desc'=>'Mining licenses, environmental compliance, mineral rights, and extractive industry regulations.'],
            ['icon'=>'bi-fuel-pump','color'=>'#e8b84b','title'=>'Oil & Gas','desc'=>'Upstream and downstream operations, petroleum agreements, regulatory compliance, and energy sector advisory.'],
            ['icon'=>'bi-graph-up','color'=>'#c9993a','title'=>'Project Finance & International Trade','desc'=>'Project financing, trade agreements, cross-border transactions, and international commerce advisory.'],
            ['icon'=>'bi-house','color'=>'#e8b84b','title'=>'Real Estate & Conveyancing','desc'=>'Property transactions, title searches, land registration, and real estate development advisory.'],
            ['icon'=>'bi-cash-coin','color'=>'#c9993a','title'=>'Tax Law','desc'=>'Tax planning, VAT compliance, tax disputes, and comprehensive tax advisory services.'],
            ['icon'=>'bi-tower','color'=>'#e8b84b','title'=>'Telecommunications','desc'=>'Telecom licensing, regulatory compliance, spectrum management, and communications sector advisory.'],
        ];

        $additionalLegal = [
            ['icon'=>'bi-airplane','color'=>'#1a202c','title'=>'Aviation','desc'=>'Aircraft registration, leasing, regulatory compliance'],
            ['icon'=>'bi-bank2','color'=>'#1a202c','title'=>'Banking & Finance','desc'=>'Banking regulations, securities, capital markets'],
            ['icon'=>'bi-building','color'=>'#1a202c','title'=>'Corporate Law','desc'=>'Company formation, M&A, governance'],
            ['icon'=>'bi-hammer','color'=>'#1a202c','title'=>'Litigation','desc'=>'Civil/commercial litigation, dispute resolution'],
            ['icon'=>'bi-gem','color'=>'#1a202c','title'=>'Mining','desc'=>'Licenses, environmental compliance, mineral rights'],
            ['icon'=>'bi-fuel-pump','color'=>'#1a202c','title'=>'Oil & Gas','desc'=>'Petroleum agreements, energy sector advisory'],
            ['icon'=>'bi-graph-up','color'=>'#1a202c','title'=>'Project Finance','desc'=>'Trade agreements, cross-border transactions'],
            ['icon'=>'bi-house','color'=>'#1a202c','title'=>'Real Estate','desc'=>'Property transactions, conveyancing'],
            ['icon'=>'bi-cash-coin','color'=>'#1a202c','title'=>'Tax Law','desc'=>'Tax planning, VAT, dispute resolution'],
            ['icon'=>'bi-tower','color'=>'#1a202c','title'=>'Telecommunications','desc'=>'Licensing, spectrum, regulatory compliance'],
        ];

        $research = [
            ['icon'=>'bi-journal-text','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Research Writing','desc'=>'Full academic and applied research writing services — from literature review to data analysis, findings, and recommendations.'],
            ['icon'=>'bi-file-earmark-check-fill','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Proposal Writing','desc'=>'Winning funding proposals for NGOs, development projects, academic grants, and government tenders.'],
            ['icon'=>'bi-card-text','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Research Synopsis','desc'=>'Concise, well-structured research synopses for academic institutions, thesis committees, and funding bodies.'],
            ['icon'=>'bi-lightbulb-fill','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Concept Notes','desc'=>'Impactful concept notes that introduce project ideas to donors, partners, and development organizations.'],
            ['icon'=>'bi-graph-up-arrow','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Business Plans','desc'=>'Comprehensive, investment-ready business plans for startups, SMEs, and organizations seeking financing.'],
        ];

        $company = [
            ['icon'=>'bi-building-fill-check','color'=>'#60a5fa','bg'=>'rgba(29,78,216,0.12)','title'=>'Company Registration','desc'=>'Full BRELA registration, TIN, Business License, VAT, and all statutory requirements for new companies and partnerships.'],
            ['icon'=>'bi-diagram-3-fill','color'=>'#60a5fa','bg'=>'rgba(29,78,216,0.12)','title'=>'Organizational Structuring','desc'=>'Designing governance frameworks, constitutions, by-laws, org charts, and operational policies for sustainable organizations.'],
            ['icon'=>'bi-hammer','color'=>'#fbbf24','bg'=>'rgba(251,191,36,0.08)','title'=>'Construction Company Registration','desc'=>'CRB, OSHA, NSSF, WCF registration and full compliance for construction and engineering firms operating in Tanzania.'],
            ['icon'=>'bi-currency-dollar','color'=>'#f87171','bg'=>'rgba(239,68,68,0.08)','title'=>'Microfinance Institution Registration','desc'=>'Full regulatory registration and compliance advisory for microfinance, SACCOS, and savings group institutions.'],
            ['icon'=>'bi-people-fill','color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.12)','title'=>'Partnership Registration','desc'=>'Formal partnership registration with BRELA, partnership agreements, and compliance setup for business partnerships.'],
            ['icon'=>'bi-person-fill','color'=>'#06b6d4','bg'=>'rgba(6,182,212,0.12)','title'=>'Sole Proprietorship Registration','desc'=>'Individual business registration, TIN, business license, and compliance for sole proprietor businesses.'],
            ['icon'=>'bi-currency-exchange','color'=>'#10b981','bg'=>'rgba(16,185,129,0.12)','title'=>'Forex and Bureau de Change Registration','desc'=>'Complete registration and licensing for forex bureaus and Bureau de Change operations in Tanzania.'],
            ['icon'=>'bi-truck','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.12)','title'=>'Logistics and Transportation Compliances','desc'=>'TRA, SUMATRA, and regulatory compliance for logistics and transportation companies.'],
            ['icon'=>'bi-box-seam','color'=>'#ef4444','bg'=>'rgba(239,68,68,0.12)','title'=>'Freights Clearing and Forwarding Compliances','desc'=>'TICTA, TRA, and customs compliance for clearing and forwarding companies.'],
            ['icon'=>'bi-passport','color'=>'#3b82f6','bg'=>'rgba(59,130,246,0.12)','title'=>'Passport and Visa Application','desc'=>'Passport application, visa processing, and immigration documentation services.'],
            ['icon'=>'bi-house-door-fill','color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.12)','title'=>'Work and Residence Permits Applications','desc'=>'Work permit, residence permit, and immigration permit applications for foreign nationals.'],
        ];

        $ngoServices = [
            ['icon'=>'bi-people-fill','color'=>'#10b981','title'=>'NGO Registration','desc'=>'Full registration of Non-Governmental Organizations with complete compliance setup and regulatory requirements.'],
            ['icon'=>'bi-house-heart-fill','color'=>'#059669','title'=>'CBO Registration','desc'=>'Registration of Community-Based Organizations for grassroots development and community initiatives.'],
            ['icon'=>'bi-globe2','color'=>'#047857','title'=>'CSO Registration','desc'=>'Registration of Civil Society Organizations for advocacy, civic engagement, and social development.'],
            ['icon'=>'bi-heart-fill','color'=>'#0d9488','title'=>'Charity Registration','desc'=>'Registration of charitable organizations for philanthropic activities and social welfare programs.'],
            ['icon'=>'bi-building-exclamation','color'=>'#0f766e','title'=>'Foundation Registration','desc'=>'Registration of foundations for grant-making, charitable endowments, and institutional philanthropy.'],
            ['icon'=>'bi-people','color'=>'#115e59','title'=>'Society Registration','desc'=>'Registration of societies and membership organizations for cultural, educational, and recreational purposes.'],
            ['icon'=>'bi-shield-lock-fill','color'=>'#065f46','title'=>'Trust Registration','desc'=>'Registration of trusts for asset protection, estate planning, and fiduciary management.'],
        ];

        $traServices = [
            ['icon'=>'bi-receipt','color'=>'#fb923c','title'=>'TIN Registration','desc'=>'Registration of Tax Identification Number (TIN) with Tanzania Revenue Authority for individuals and businesses.'],
            ['icon'=>'bi-percent','color'=>'#f472b6','title'=>'VAT Registration','desc'=>'Registration of Value Added Tax Number (VAT) for businesses meeting TRA threshold requirements.'],
            ['icon'=>'bi-file-earmark-text','color'=>'#a78bfa','title'=>'Tax Returns Filing','desc'=>'Professional tax returns filing services for corporate and individual taxpayers with TRA compliance.'],
            ['icon'=>'bi-cash-coin','color'=>'#60a5fa','title'=>'Tax Advisory','desc'=>'Strategic tax planning, consultation, and advisory services for optimal tax compliance and efficiency.'],
            ['icon'=>'bi-shield-check','color'=>'#34d399','title'=>'Tax Compliance Audit','desc'=>'Comprehensive tax compliance audits to ensure full adherence to TRA regulations and requirements.'],
            ['icon'=>'bi-graph-up','color'=>'#f87171','title'=>'Tax Dispute Resolution','desc'=>'Expert representation and resolution services for tax disputes, assessments, and negotiations with TRA.'],
        ];

        $whys = [
            ['icon'=>'bi-person-hearts','grad'=>'linear-gradient(135deg,#c9993a,#a07825)','title'=>'Approachable & Client-Centered','desc'=>'We listen first. Every service is tailored to your unique situation — no generic answers, no one-size-fits-all solutions.'],
            ['icon'=>'bi-globe-americas','grad'=>'linear-gradient(135deg,#e8b84b,#c9993a)','title'=>'Local Expertise, Global Standards','desc'=>'Deep knowledge of Tanzanian law, regulations, and business environment — combined with international best practices.'],
            ['icon'=>'bi-clock-history','grad'=>'linear-gradient(135deg,#c9993a,#a07825)','title'=>'Timely & Reliable','desc'=>'We respect deadlines. Whether it is a court filing, registration deadline, or research submission — we deliver on time, every time.'],
            ['icon'=>'bi-piggy-bank-fill','grad'=>'linear-gradient(135deg,#e8b84b,#c9993a)','title'=>'Transparent Pricing','desc'=>'No hidden fees, no surprises. Clear, upfront pricing for all services with detailed breakdowns before you commit.'],
        ];

        $testi = [
            ['q'=>'Kasimbagu handled our company registration from BRELA to TIN to business license in record time. Professional, fast, and completely transparent. Highly recommended!','name'=>'Juma Mwangi','role'=>'CEO, Mwangi Enterprises, Dar es Salaam','init'=>'JM'],
            ['q'=>'Their research writing team transformed my rough thesis into a polished, well-structured document. The methodology and analysis were outstanding. I passed with distinction.','name'=>'Grace Mbeki','role'=>'PhD Candidate, University of Dar es Salaam','init'=>'GM'],
            ['q'=>'We needed urgent NGO registration for a donor-funded project. Kasimbagu delivered within two weeks, including all compliance documentation. Exceptional service.','name'=>'John Kimani','role'=>'Program Director, Hope Foundation Kenya','init'=>'JK'],
        ];

        $blogs = Blog::where('is_published', true)
            ->whereIn('category', ['Consultancy', 'Legal', 'Business', 'Research', 'Tax', 'NGO'])
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        $upcomingEvents = Event::where('is_published', true)->where('event_date', '>=', now())->orderBy('event_date', 'asc')->take(3)->get();

        return view('side1.index', compact('values', 'legal', 'additionalLegal', 'research', 'company', 'ngoServices', 'traServices', 'whys', 'testi', 'blogs', 'upcomingEvents'));
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'phone'       => ['nullable', 'string', 'max:30'],
            'service'     => ['nullable', 'string', 'max:100'],
            'destination' => ['nullable', 'string', 'max:100'],
            'subject'     => ['nullable', 'string', 'max:255'],
            'message'     => ['required', 'string', 'max:3000'],
        ]);

        Inquiry::create(array_merge($data, [
            'source'     => $request->header('referer', 'direct'),
            'ip_address' => $request->ip(),
        ]));

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been received. We will respond within 24 hours.',
            ]);
        }

        return back()->with('success', 'Thank you! Your message has been received. We will respond within 24 hours.');
    }
}

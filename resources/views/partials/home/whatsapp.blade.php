<!-- WhatsApp Floating Button -->
<a href="https://wa.me/255700000000" target="_blank" class="kasb-wa-btn" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<style>
    .kasb-wa-btn {
        position: fixed;
        bottom: 28px;
        right: 28px;
        width: 58px;
        height: 58px;
        background: #25d366;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        box-shadow: 0 6px 20px rgba(37,211,102,0.45);
        z-index: 9990;
        text-decoration: none;
        transition: transform 0.3s ease;
        animation: pulse-wa 2.5s infinite;
    }
    .kasb-wa-btn:hover { transform: scale(1.15); color: white; }
    @keyframes pulse-wa {
        0%   { box-shadow: 0 0 0 0 rgba(37,211,102,0.6); }
        70%  { box-shadow: 0 0 0 18px rgba(37,211,102,0); }
        100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
    }
</style>

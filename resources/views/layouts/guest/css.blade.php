<!-- Favicon -->
<link href="{{ asset('asset/img/favicon.ico') }}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('asset/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

<style>
    .whatsapp-float {
        position: fixed;
        width: 55px;
        height: 55px;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        transition: 0.3s;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        background-color: #1ebe5d;
    }

    .kk-barber-card {
    background: #1c1e22;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    transition: 0.3s ease;
}

.kk-barber-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.45);
}

.kk-barber-image {
    width: 100%;
    height: 260px;
    object-fit: cover;
}

.kk-barber-body {
    padding: 15px;
    text-align: center;
}

.kk-title {
    font-size: 17px;
    text-transform: uppercase;
    font-weight: 700;
    color: #fff;
}

.kk-desc {
    font-size: 14px;
    margin-top: 4px;
    color: #ff4d4d;
}

.kk-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 12px;
}

.kk-btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    border: none;
    transition: 0.2s;
}

.kk-btn:hover {
    opacity: .85;
    transform: translateY(-2px);
}
</style>

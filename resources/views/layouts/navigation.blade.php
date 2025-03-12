<style>
    .cart-counter {
        background-color: red;
        color: white;
        font-size: 12px;
        border-radius: 50%;
        padding: 5px;
        position: absolute;
        top: -5px;
        right: -10px;
    }
</style>

<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <a class="navbar-brand p-0" href="#"> <img src="{{ asset('images/bookstorelogo.jpg') }}" height="65" width="150"> </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookpage">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categorypage">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogpage">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactpage">Contact</a>
                </li>
            </ul>

            <div class="me-3">
                <a href="/cartpage"><i class="bi bi-bag fs-4 text-dark"></i></a>
            </div>

            <div class="me-3">
                <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-dark"></i></a>
            </div>
        </div>

    </div>
</nav>

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

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
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

            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    style="height: 30px">
                <button class="btn btn-outline-secondary p-0 px-2 me-2" type="submit" style="height: 30px">
                    <i class="bi bi-search"></i></button>
            </form> --}}

            <div class="mx-2">
                <a href="/cartpage"><i class="bi bi-bag fs-4 text-secondary"></i></a>
            </div>

            <div class="mx-2">
                <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-secondary"></i></a>
            </div>
        </div>

    </div>
</nav>

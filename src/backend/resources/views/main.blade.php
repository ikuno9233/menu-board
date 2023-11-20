<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>献立表</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"
        integrity="sha256-BicZsQAhkGHIoR//IB2amPN5SrRb3fHB8tFsnqRAwnk=" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <header class="d-flex justify-content-center align-items-center my-3">
                    <div>
                        <h1 class="m-0">今週の献立</h1>
                        <a href="{{ route('show_edit_form') }}" class="btn btn-light mt-1 mx-auto w-100">
                            編集 <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </header>
                <main>
                    <table class="table border-top">
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr @if (today()->is($menu['date'])) class="table-light" @endif>
                                    <td rowspan="3">{{ $menu['date']->isoFormat('ddd') }}</td>
                                    <td>朝</td>
                                    <td>{{ $menu['menu']?->menu_breakfast ?? '---' }}</td>
                                </tr>
                                <tr @if (today()->is($menu['date'])) class="table-light" @endif>
                                    <td>昼</td>
                                    <td>{{ $menu['menu']?->menu_lunch ?? '---' }}</td>
                                </tr>
                                <tr @if (today()->is($menu['date'])) class="table-light" @endif>
                                    <td>夜</td>
                                    <td>{{ $menu['menu']?->menu_dinner ?? '---' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

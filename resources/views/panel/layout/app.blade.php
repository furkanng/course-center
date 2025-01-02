<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("panel/assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset("panel/assets/img/favicon.png")}}">
    <title>
        Hangi Derslig Panel
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="{{asset("panel/assets/css/nucleo-icons.css")}}" rel="stylesheet"/>
    <link href="{{asset("panel/assets/css/style.css")}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset("front/assets/css/nice-select.css")}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset("panel/assets/css/soft-ui-dashboard.css?v=1.1.0")}}" rel="stylesheet"/>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">

<!-- Sidebar -->
@if(auth()->user()->role === \App\Enums\UserRole::ADMIN)
    @include("panel.inc.sidebar")
@elseif(auth()->user()->role === \App\Enums\UserRole::COMPANY)
    @include("merchant.inc.sidebar")
@endif
<!-- Sidebar End -->

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    @include("panel.inc.navbar")
    <!-- End Navbar -->

    <!-- Content -->
    <div class="container-fluid py-4">

        @yield('content')

        <!-- Footer -->
        @include("panel.inc.footer")
        <!-- Footer End -->

    </div>
    <!-- Content End -->

    <!-- Components -->

    <x-spinner />

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error" />
        @endforeach
    @endif

    @if(session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if(session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <!-- Components End -->

</main>

<!-- Sağ Sekme -->

<!-- Sağ Sekme Son -->

<!--   Core JS Files   -->
<script src="{{asset("panel/assets/js/core/popper.min.js")}}"></script>
<script src="{{asset("panel/assets/js/core/bootstrap.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/smooth-scrollbar.min.js")}}"></script>
<!-- Kanban scripts -->
<script src="{{asset("panel/assets/js/plugins/dragula/dragula.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/jkanban/jkanban.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/chartjs.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/threejs.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/orbit-controls.js")}}"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset("panel/assets/js/soft-ui-dashboard.min.js?v=1.1.0")}}"></script>
<script src="{{asset("front/assets/js/vendor/jquery.js")}}"></script>
<script src="{{asset("panel/assets/js/form-spinner.js")}}"></script>
<script src="{{asset("panel/assets/js/alert-timeout.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/datatables.js")}}"></script>
<script src="{{asset("front/assets/js/service.js")}}"></script>
<script src="{{asset("front/assets/js/nice-select.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/dropzone.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/flatpickr.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/quill.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/choices.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/leaflet.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/nouislider.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/multistep-form.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/photoswipe.min.js")}}"></script>
<script src="{{asset("panel/assets/js/plugins/photoswipe-ui-default.min.js")}}"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script>

    (function () {
        const container = document.getElementById("globe");
        const canvas = container.getElementsByTagName("canvas")[0];

        const globeRadius = 100;
        const globeWidth = 4098 / 2;
        const globeHeight = 1968 / 2;

        function convertFlatCoordsToSphereCoords(x, y) {
            let latitude = ((x - globeWidth) / globeWidth) * -180;
            let longitude = ((y - globeHeight) / globeHeight) * -90;
            latitude = (latitude * Math.PI) / 180;
            longitude = (longitude * Math.PI) / 180;
            const radius = Math.cos(longitude) * globeRadius;

            return {
                x: Math.cos(latitude) * radius,
                y: Math.sin(longitude) * globeRadius,
                z: Math.sin(latitude) * radius
            };
        }

        function makeMagic(points) {
            const {
                width,
                height
            } = container.getBoundingClientRect();

            // 1. Setup scene
            const scene = new THREE.Scene();
            // 2. Setup camera
            const camera = new THREE.PerspectiveCamera(45, width / height);
            // 3. Setup renderer
            const renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true
            });
            renderer.setSize(width, height);
            // 4. Add points to canvas
            // - Single geometry to contain all points.
            const mergedGeometry = new THREE.Geometry();
            // - Material that the dots will be made of.
            const pointGeometry = new THREE.SphereGeometry(0.5, 1, 1);
            const pointMaterial = new THREE.MeshBasicMaterial({
                color: "#989db5",
            });

            for (let point of points) {
                const {
                    x,
                    y,
                    z
                } = convertFlatCoordsToSphereCoords(
                    point.x,
                    point.y,
                    width,
                    height
                );

                if (x && y && z) {
                    pointGeometry.translate(x, y, z);
                    mergedGeometry.merge(pointGeometry);
                    pointGeometry.translate(-x, -y, -z);
                }
            }

            const globeShape = new THREE.Mesh(mergedGeometry, pointMaterial);
            scene.add(globeShape);

            container.classList.add("peekaboo");

            // Setup orbital controls
            camera.orbitControls = new THREE.OrbitControls(camera, canvas);
            camera.orbitControls.enableKeys = false;
            camera.orbitControls.enablePan = false;
            camera.orbitControls.enableZoom = false;
            camera.orbitControls.enableDamping = false;
            camera.orbitControls.enableRotate = true;
            camera.orbitControls.autoRotate = true;
            camera.position.z = -265;

            function animate() {
                // orbitControls.autoRotate is enabled so orbitControls.update
                // must be called inside animation loop.
                camera.orbitControls.update();
                requestAnimationFrame(animate);
                renderer.render(scene, camera);
            }

            animate();
        }

        function hasWebGL() {
            const gl =
                canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
            if (gl && gl instanceof WebGLRenderingContext) {
                return true;
            } else {
                return false;
            }
        }

        function init() {
            if (hasWebGL()) {
                window
                window.fetch("https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json")
                    .then(response => response.json())
                    .then(data => {
                        makeMagic(data.points);
                    });
            }
        }

        init();
    })();
</script>
<script>
    if (document.getElementById('editor')) {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    }

    if (document.getElementById('choices-multiple-remove-button')) {
        var element = document.getElementById('choices-multiple-remove-button');
        const example = new Choices(element, {
            removeItemButton: true
        });

        example.setChoices(
            [{
                value: 'One',
                label: 'Label One',
                disabled: true
            },
                {
                    value: 'Two',
                    label: 'Label Two',
                    selected: true
                },
                {
                    value: 'Three',
                    label: 'Label Three'
                },
            ],
            'value',
            'label',
            false,
        );
    }

    if (document.querySelector('.datetimepicker')) {
        flatpickr('.datetimepicker', {
            allowInput: true
        }); // flatpickr
    }

    Dropzone.autoDiscover = false;
    var drop = document.getElementById('dropzone')
    var myDropzone = new Dropzone(drop, {
        url: "/file/post",
        addRemoveLinks: true

    });
</script>

<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function(token) {
                // Formlara otomatik olarak token ekle
                const forms = document.querySelectorAll('form');
                forms.forEach(form => {
                    let input = form.querySelector('input[name="g-recaptcha-response"]');
                    if (!input) {
                        input = document.createElement('input');
                        input.setAttribute('type', 'hidden');
                        input.setAttribute('name', 'g-recaptcha-response');
                        form.appendChild(input);
                    }
                    input.value = token;
                });
            });
        });
    });
</script>
@stack('style')
@stack('scripts')
</body>

</html>

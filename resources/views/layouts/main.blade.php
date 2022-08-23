<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta http-equiv="refresh" content="60">
    <meta name="author" content="" />
    <title>Dashboard - SmartTemp UP</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="nav-fixed">
    @include('layouts.navbar', [
        'notifications' => \App\Models\Notification::orderBy('id', 'desc')->get(),
    ])
    @include('layouts.sidebar')
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/litepicker.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            checkNotifcation();
            setInterval(function() {
                getOneNotification();
            }, 10000);
        });

        const checkNotifcation = () => {
            $.ajax({
                url: '{{ route('get-user-notification') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.data.length > 0) {
                        $(data.data).each(function(index, value) {
                            let array = JSON.parse(value.data);
                            $('#notification-container').append(generateNotificationTemplate(array,
                                value.id));
                        });
                        $('#last_date_notif').val(data.last_created_at);
                    }
                }
            });
        }

        const getOneNotification = () => {
            $.ajax({
                url: '{{ route('get-one-user-notification') }}',
                type: 'GET',
                data: {
                    last_date: $('#last_date_notif').val()
                },
                dataType: 'json',
                success: function(data) {
                    if (data.data) {
                        console.log(data);
                        let array = JSON.parse(data.data.data);
                        $('#notification-container').append(generateNotificationTemplate(array, data.data
                            .id));
                        $('#last_date_notif').val(data.last_created_at);
                    }
                }
            });
        }

        const readNotification = (id) => {
            $.ajax({
                url: '{{ route('read-user-notification') }}',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.success) {
                        $('#notification-' + id).remove();
                    }
                }
            });
        }

        const generateNotificationTemplate = (item, id) => {
            let template = `<a onclick="readNotification('${id}')" class="dropdown-item dropdown-notifications-item" href="${item.link}">
                                <div class="dropdown-notifications-item-content">
                                    <div class="dropdown-notifications-item-content-details">${item.date}</div>
                                    <div class="dropdown-notifications-item-content-text">${item.title}</div>
                                </div>
                            </a>`;

            return template;
        }
    </script>

    @stack('extra_js')
</body>

</html>

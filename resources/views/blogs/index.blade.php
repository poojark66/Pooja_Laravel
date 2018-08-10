<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

@foreach($blogs as $blog)

    <h3>{{ $blog->title }}</h3>
    <p>{{ $blog->description}}</p>
    <p>
        <a href="{{ route('show', [$blog->id, $id]) }}" class="btn btn-info">View Task</a>
		@if($id == 1)
			<a href="{{ route('edit', [$blog->id, $id]) }}" class="btn btn-primary">Edit Task</a>
		@endif
    </p>
    <hr>
@endforeach

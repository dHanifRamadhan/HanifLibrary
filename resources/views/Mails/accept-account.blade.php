<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div style="border-radius: 0.375rem; width: max-content; height: 24rem; background-color: #E2E8F0">
        <div
            style="padding-top: 3.5rem; padding-bottom: 3.5rem; padding-left: 5rem; padding-right: 5rem; width: 100%; height: 100%;">
            <div style="width: max-content; height: 18rem; display: flex; justify-content: center; align-items: center;">
                <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 2.5rem; width: 24rem;">
                    <h1
                        style="text-align: center; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; font-weight: 600; font-size: 1.5rem; line-height: 2rem;">
                        Email verification
                    </h1>
                    {{-- {{ $data['name'] }} --}}
                    <p
                        style="font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New' , monospace; text-align: center; font-size: 0.75rem; line-height: 1rem;">
                        {{$data->name}} please click the button below to verify your email. To enter our library
                        website
                    </p>
                    {{-- http://localhost:8000/auth/register/accept-account/{{$data['id']}} --}}
                    <a href="{{route('auth.accept.mail', $data->id)}}"
                    style="border-width:2px;background-color:transparent;background-image:none;border-color:#000;border-radius:0.375rem;padding-left:0.55rem;padding-right:0.55rem;padding-top:0.25rem;padding-bottom:0.25rem;display:flex;text-decoration:none;text-align:center;color:#000;border:1px solid #000;margin-left:auto;margin-right:auto; height: max-content;">
                        <span
                            style="font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; font-size: 0.875rem; line-height: 1.25rem; font-weight: 600; height: max-content;">
                            Verification
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

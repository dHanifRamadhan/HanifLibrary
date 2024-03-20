<!DOCTYPE html>
<html lang="en">

<body style="height: 100vh; background-color: #f8fafc; margin: 0; padding-top: 50px">
    <div style="background-color: #edf2f7; border-radius: 0.375rem; border: 1px solid #a0aec0; width: 33.48rem; margin: auto;">
        <img src="https://i.pinimg.com/564x/c3/a2/b5/c3a2b5075ecc44c45abf1466a35a0d73.jpg" alt="" style="height: 13rem; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; object-fit: cover;">
        <div style="padding: 1.25rem;">
            <h1 style="text-align: center; font-size: 1.125rem; font-weight: 600;">Thanks for joining us</h1>
            <div style="text-align: center; font-size: 0.875rem; color: #4a5568;">To complete your profile, we need you to confirm your email address so we know that you're reachable at this address.</div>
            <form action="{{route('auth.accept.mail', $data->id)}}" method="GET" style="display: flex; justify-content: center; margin-top: 1rem;">
                <input type="hidden" name="ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa" value="{{$data->id}}">
                <button style="padding: 1rem 2rem; border: 1px solid #000; border-radius: 0.375rem; cursor: pointer; transition: background-color 0.3s ease; margin-left: auto; margin-right: auto;">Confirm email address</button>
            </form>
            <span style="position: relative; bottom: -4rem; font-weight: 700; text-align: center; margin-top: 50px">By Hanif Ramadhan</span>
        </div>
    </div>k
</body>

</html>

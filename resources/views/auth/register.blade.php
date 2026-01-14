<form method="POST" action="/register">
@csrf
<input name="username" placeholder="Username" required>
<input name="email" placeholder="Email" required>
<input name="password" type="password" required>
<button>REGISTER</button>
</form>

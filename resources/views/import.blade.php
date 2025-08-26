<h4>ကွန်ပျူတာကျွမ်းကျင်မှုသင်တန်း</h4>
<form action="/import" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Excel</button>
</form>
<br>
<h4>Applied Training</h4>
<form action="/importapplied" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Excel</button>
</form>
<br>
<h4>မွမ်းမံသင်တန်း</h4>
<form action="/importrefresher" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Excel</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

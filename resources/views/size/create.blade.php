<form action="{{route('size.store')}}" method="POST">
    @csrf
    <div class="w-full ">
        <label for="text-lg">size</label>
        <input class="border-2 rounded-md" id="name" name="name" type="text">
    </div>

</form>
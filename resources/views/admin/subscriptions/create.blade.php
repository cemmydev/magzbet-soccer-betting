<form method="post" class="p-4" >
    @csrf
    <p class="font-bold py-4">Edit Subscription Plan</p>
    <label for="sub_name">Subscription Name</label>
    <input id="sub_name" type="text" class="block w-full p-2" name="name">
    <label for="sub_cost">Subscription Cost</label>
    <input id="sub_cost" type="text" class="block w-full p-2" name="cost">
    <label for="sub_description">Description</label>
    <input id="sub_description" type="text" class="block w-full p-2" name="description">
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
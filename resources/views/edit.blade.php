<form method="POST" action="{{ route('posts.update', $post->id) }}"
    style="width: 30%; max-width: 600px; margin: 0 auto; padding: 30px; background-color: #f7e4f4; border-radius: 10px;">
    @csrf
    @method('PATCH')

    <input type="text" name="title" value="{{ $post->title }}" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px;">
    <input type="text" name="category_id" value="{{ $post->category_id }}" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px;">
    <input type="text" name="user_id" value="{{ $post->user_id }}" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px;">
    <textarea name="description" style="width: 100%; padding: 30px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px;">{{ $post->description }}</textarea>
    <button type="submit" style="background-color: #713d6e; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">Save Change </button>
</form>

@foreach($posts as $post)
<tr onclick="location.href='{{ route('post.all', ['id' => $post['id']]) }}'" style="cursor: pointer;">
    <td><img src="https://via.placeholder.com/50" alt="ユーザー名" class="user-image">{{ $post['image'] }}</td>
    <td>{{ $post['title'] }}</td>
    <td>{{ $post['detail'] }}</td>
    <td>{{ $post['amount'] }}</td>
    <td>{{ $post['status'] }}</td>
</tr>
@endforeach

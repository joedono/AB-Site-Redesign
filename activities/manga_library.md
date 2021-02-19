---
title: Manga Library
---
# The Todd MacDonald Memorial Manga Library

Todd MacDonald was a dedicated Anime Boston staffer from 2003-2009 who loved to read as much as he loved anime. We have named the Manga Library in his honor as a way of saying thank you to him for all that he has done for our convention.

When you need a quiet place to read, or to take a break from the convention hustle, the Manga Library is the perfect escape. With over 2400 titles and comfy bean bags, you’re sure to find a new favorite, or revisit an old friend.

The Manga Library is located in the Fairfax Room on the 3rd floor of the Sheraton

Hours:
* Friday: 10:00am–12:00am
* Saturday: 9:00am–12:00am
* Sunday: 9:00am–2:00pm

This is the current listing for manga included in Anime Boston's Manga Library:

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Volume</th>
      <th>Artist</th>
      <th>Author</th>
      <th>Genre(s)</th>
    </tr>
  </thead>
  <tbody>
    {% for manga in site.data.manga_library %}
    <tr>
      <td>{{ manga.title }}</td>
      <td>{{ manga.volume }}</td>
      <td>{{ manga.artist }}</td>
      <td>{{ manga.author }}</td>
      <td>{{ manga.genres }}</td>
    </tr>
    {% endfor %}
  </tbody>
</table>

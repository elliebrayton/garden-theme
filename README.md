# garden-theme

### Notes
### Sources
**Bootstrap Nav Walker**
To ensure the Bootstrap navigation worked well with wordpress I used the WP Bootstrap Nav Walker. This source was provided to me in my class, and has made my life so much easier. 

**Comma in between Post Tags**
For the blog page, I wanted to list out all the tags that each post had. I I wanted to seperate each individual tag with a comma. To do this, I took some time searching on Google, which eventually lef me to Stack Overflow. I'm still trying to get the hang of PHP, but implode in this scenario was my friend. 

https://stackoverflow.com/questions/3471069/wordpress-removing-the-last-comma-for-tag-list

```
$posttags = get_the_tags();
if ($posttags) {
   $tagstrings = array();
   foreach($posttags as $tag) {
      $tagstrings[] = '<a href="' . get_tag_link($tag->term_id) . '" class="tag-link-' . $tag->term_id . '">' . $tag->name . '</a>';
   }
   echo implode(', ', $tagstrings);
}
```

**Removing [...] from end of excerpt**
https://wordpress.stackexchange.com/questions/162109/remove-more-or-text-from-short-post
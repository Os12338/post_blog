TYPE=VIEW
query=select count(`blog`.`posts_likes`.`id`) AS `like_num`,`blog`.`posts_likes`.`user_id` AS `user_id`,`blog`.`posts`.`id` AS `post_id` from (`blog`.`posts_likes` left join `blog`.`posts` on(`blog`.`posts`.`id` = `blog`.`posts_likes`.`post_id`)) group by `blog`.`posts`.`id`
md5=4f09962322821e75c26d6c8c3234547d
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-30 13:33:07
create-version=2
source=SELECT COUNT(posts_likes.id)as like_num,posts_likes.user_id AS user_id ,posts.id AS post_id\nFROM posts\nRIGHT JOIN posts_likes\nON posts.id = posts_likes.post_id\nGROUP by posts.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select count(`blog`.`posts_likes`.`id`) AS `like_num`,`blog`.`posts_likes`.`user_id` AS `user_id`,`blog`.`posts`.`id` AS `post_id` from (`blog`.`posts_likes` left join `blog`.`posts` on(`blog`.`posts`.`id` = `blog`.`posts_likes`.`post_id`)) group by `blog`.`posts`.`id`
mariadb-version=100203

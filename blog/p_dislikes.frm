TYPE=VIEW
query=select count(`blog`.`posts_dislikes`.`id`) AS `dislike_num`,`blog`.`posts_dislikes`.`user_id` AS `user_id`,`blog`.`posts`.`id` AS `post_id` from (`blog`.`posts_dislikes` left join `blog`.`posts` on(`blog`.`posts`.`id` = `blog`.`posts_dislikes`.`post_id`)) group by `blog`.`posts`.`id`
md5=5ff9b7155861c19edd34e940fda75038
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-30 13:37:50
create-version=2
source=SELECT COUNT(posts_dislikes.id)as dislike_num,posts_dislikes.user_id AS user_id ,posts.id AS post_id\nFROM posts\nRIGHT JOIN posts_dislikes\nON posts.id = posts_dislikes.post_id\nGROUP by posts.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select count(`blog`.`posts_dislikes`.`id`) AS `dislike_num`,`blog`.`posts_dislikes`.`user_id` AS `user_id`,`blog`.`posts`.`id` AS `post_id` from (`blog`.`posts_dislikes` left join `blog`.`posts` on(`blog`.`posts`.`id` = `blog`.`posts_dislikes`.`post_id`)) group by `blog`.`posts`.`id`
mariadb-version=100203

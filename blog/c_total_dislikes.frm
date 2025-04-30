TYPE=VIEW
query=select count(`blog`.`comments_dislikes`.`id`) AS `dislike_num`,`blog`.`comments_dislikes`.`user_id` AS `user_id`,`blog`.`comments`.`id` AS `comment_id` from (`blog`.`comments_dislikes` left join `blog`.`comments` on(`blog`.`comments`.`id` = `blog`.`comments_dislikes`.`comment_id`)) group by `blog`.`comments`.`id`
md5=89961c0abbf978d2ce1dc82b0b242665
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-30 13:16:52
create-version=2
source=SELECT COUNT(comments_dislikes.id)as dislike_num, comments_dislikes.user_id as user_id, comments.id as comment_id\nFROM comments\nRIGHT JOIN comments_dislikes\nON comments.id = comments_dislikes.comment_id\nGROUP BY comments.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select count(`blog`.`comments_dislikes`.`id`) AS `dislike_num`,`blog`.`comments_dislikes`.`user_id` AS `user_id`,`blog`.`comments`.`id` AS `comment_id` from (`blog`.`comments_dislikes` left join `blog`.`comments` on(`blog`.`comments`.`id` = `blog`.`comments_dislikes`.`comment_id`)) group by `blog`.`comments`.`id`
mariadb-version=100203

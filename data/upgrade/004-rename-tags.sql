-- Rename tags in TABLE 'tags'
UPDATE `tags` SET `name` = 'wikimedia' WHERE `name` = 'wmde';
UPDATE `tags` SET `name` = 'mitglieder' WHERE `name` = 'member';
UPDATE `tags` SET `name` = 'projekt' WHERE `name` = 'project';
-- Rename tags in TABLE 'posts' 
UPDATE `posts` SET `tags` = REPLACE(`tags`,  'wmde', 'wikimedia');
UPDATE `posts` SET `tags` = REPLACE(`tags`,  'member', 'mitglieder');
UPDATE `posts` SET `tags` = REPLACE(`tags`,  'project', 'projekt');

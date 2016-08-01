SELECT
  c.cate_title,
  c.cate_sort,
  count(q.question_id) AS
    question_count
FROM tang_category AS c LEFT JOIN tang_question AS
                                  q ON c.cate_id = q.category_id
GROUP BY c.cate_id
ORDER BY c.cate_sort;

DROP TABLE IF EXISTS tang_anwser;

CREATE TABLE tang_anwser (
  answer_id      INT UNSIGNED NOT NULL auto_increment,
  question_id    INT UNSIGNED NOT NULL DEFAULT 0,
  answer_content TEXT,
  user_id        INT UNSIGNED NOT NULL DEFAULT 0,
  add_time       INT          NOT NULL,
  PRIMARY KEY (answer_id)
)charset = utf8;


DROP TABLE IF EXISTS tang_role;

CREATE TABLE tang_role (
  role_id   INT UNSIGNED NOT NULL auto_increment,
  role_name VARCHAR(64)  NOT NULL DEFAULT '',
  PRIMARY KEY (role_id)
)charset = utf8;
INSERT INTO tang_role (role_id, role_name) VALUES (1, '管理员');
INSERT INTO tang_role (role_id, role_name) VALUES (2, '会员');
DROP TABLE IF EXISTS tang_user;
CREATE TABLE tang_user (
  user_id           INT UNSIGNED NOT NULL auto_increment,
  user_name         VARCHAR(64)  NOT NULL DEFAULT '',
  user_password     VARCHAR(64)  NOT NULL DEFAULT '',
  password_salt     VARCHAR(16)  NOT NULL DEFAULT '',
  user_display_name VARCHAR(32)  NOT NULL DEFAULT '',
  user_email        VARCHAR(255) NOT NULL DEFAULT '',
  role_id           INT          NOT NULL DEFAULT 0,
  active_code       VARCHAR(64)  NOT NULL DEFAULT '',
  active_code_time  INT          NOT NULL DEFAULT 0,
  is_actived        TINYINT      NOT NULL DEFAULT 0,
  PRIMARY KEY (user_id)
)charset = utf8;

INSERT INTO tang_user (user_name, user_password, password_salt, role_id)
VALUES ('tangdengshuai_123', md5(concat('tangShuai_', '123')), '123', 1);


SELECT
  count(tq.question_id) AS question_num,
  t.topic_title,
  q.question_content
FROM
  tang_topic_question AS tq
  LEFT JOIN tang_topic AS t ON tq.topic_id = t.topic_id
  LEFT JOIN
  tang_question AS q ON tq.question_id = q.question_id
GROUP BY tq.topic_id
ORDER BY question_num
  DESC
LIMIT 3;

SELECT t.* FROM(
SELECT
        count(q.question_content) AS q_num,
        (u.user_name)             AS username
      FROM tang_question AS q LEFT JOIN `tang_user` AS u ON q.user_id = u.user_id
      GROUP BY u.user_id
      HAVING username IS NOT NULL
      ORDER BY q.add_time
        DESC)as t  order by t.q_num desc limit 1;


select a.anwser_content,u.user_name from tang_anwser
as a left join tang_user as u on a.user_id=u.user_id GROUP BY order by a.add_time desc;
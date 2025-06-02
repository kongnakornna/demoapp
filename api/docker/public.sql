/*
 Navicat Premium Dump SQL

 Source Server         : docker postgres-5430
 Source Server Type    : PostgreSQL
 Source Server Version : 160009 (160009)
 Source Host           : 127.0.0.1:5430
 Source Catalog        : nest_demo
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160009 (160009)
 File Encoding         : 65001

 Date: 03/06/2025 03:34:19
*/


-- ----------------------------
-- Sequence structure for sd_user_file_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sd_user_file_id_seq";
CREATE SEQUENCE "public"."sd_user_file_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sd_user_role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sd_user_role_id_seq";
CREATE SEQUENCE "public"."sd_user_role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for sd_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."sd_user";
CREATE TABLE "public"."sd_user" (
  "id" uuid NOT NULL DEFAULT uuid_generate_v4(),
  "createddate" timestamp(6) NOT NULL DEFAULT now(),
  "updateddate" timestamp(6) NOT NULL DEFAULT now(),
  "deletedate" date,
  "role_id" int4 NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password_temp" varchar(255) COLLATE "pg_catalog"."default",
  "firstname" varchar(255) COLLATE "pg_catalog"."default",
  "lastname" varchar(255) COLLATE "pg_catalog"."default",
  "fullname" varchar(255) COLLATE "pg_catalog"."default",
  "nickname" varchar(255) COLLATE "pg_catalog"."default",
  "idcard" varchar(255) COLLATE "pg_catalog"."default",
  "lastsignindate" timestamp(6) NOT NULL DEFAULT now(),
  "status" int2 NOT NULL,
  "active_status" int2,
  "network_id" int4,
  "remark" varchar(255) COLLATE "pg_catalog"."default",
  "infomation_agree_status" int2,
  "gender" varchar(255) COLLATE "pg_catalog"."default",
  "birthday" date,
  "online_status" varchar(255) COLLATE "pg_catalog"."default",
  "message" varchar(255) COLLATE "pg_catalog"."default",
  "network_type_id" int4,
  "public_status" int2,
  "type_id" int4,
  "avatarpath" varchar(255) COLLATE "pg_catalog"."default",
  "avatar" varchar(255) COLLATE "pg_catalog"."default",
  "refresh_token" text COLLATE "pg_catalog"."default",
  "loginfailed" int2,
  "public_notification" int2 DEFAULT '0'::smallint,
  "sms_notification" int2 DEFAULT '0'::smallint,
  "email_notification" int2 DEFAULT '0'::smallint,
  "line_notification" int2 DEFAULT '0'::smallint,
  "mobile_number" varchar(255) COLLATE "pg_catalog"."default",
  "phone_number" varchar(255) COLLATE "pg_catalog"."default",
  "lineid" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of sd_user
-- ----------------------------
INSERT INTO "public"."sd_user" VALUES ('85b7b753-8c21-47b7-8ea8-0e7b729c3604', '2025-06-02 20:05:06.191832', '2025-06-02 20:31:41', NULL, 4, 'demoadminapp@gmail.com', 'demoadminapp', '$2b$10$XzlHuYFP2ezo1DU0nQkHrOXO.XjlhJEqBjj/x/DnU71HQcSFp1YIm', 'Demo@0123', NULL, NULL, NULL, NULL, NULL, '2025-06-02 20:31:41', 1, 1, NULL, NULL, 0, NULL, NULL, NULL, 'Register', NULL, NULL, NULL, NULL, NULL, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijg1YjdiNzUzLThjMjEtNDdiNy04ZWE4LTBlN2I3MjljMzYwNCIsImlhdCI6MTc0ODg5NjMwMSwiZXhwIjoxNzUxNDg4MzAxfQ.RcqqidwlD4moLvp3CK6s6kyEquV7w9OoraN4yJ-4O84', 0, 0, 0, 0, 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for sd_user_file
-- ----------------------------
DROP TABLE IF EXISTS "public"."sd_user_file";
CREATE TABLE "public"."sd_user_file" (
  "id" int4 NOT NULL DEFAULT nextval('sd_user_file_id_seq'::regclass),
  "file_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "file_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "file_path" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "file_type_id" int4 NOT NULL,
  "uid" varchar(255) COLLATE "pg_catalog"."default",
  "file_date" timestamp(6) NOT NULL DEFAULT now(),
  "status" int2 NOT NULL
)
;

-- ----------------------------
-- Records of sd_user_file
-- ----------------------------

-- ----------------------------
-- Table structure for sd_user_role
-- ----------------------------
DROP TABLE IF EXISTS "public"."sd_user_role";
CREATE TABLE "public"."sd_user_role" (
  "id" int4 NOT NULL DEFAULT nextval('sd_user_role_id_seq'::regclass),
  "role_id" int4 NOT NULL,
  "title" varchar(50) COLLATE "pg_catalog"."default",
  "createddate" timestamp(6) DEFAULT now(),
  "updateddate" timestamp(6) DEFAULT now(),
  "create_by" int4 NOT NULL,
  "lastupdate_by" int4 NOT NULL,
  "status" int2 NOT NULL,
  "type_id" int4 NOT NULL,
  "lang" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of sd_user_role
-- ----------------------------
INSERT INTO "public"."sd_user_role" VALUES (1, 1, 'Dev', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (2, 2, 'Administrator', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (3, 3, 'Company', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (4, 4, 'Staff', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (5, 5, 'Helpdask', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (6, 6, 'Customer', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (7, 7, 'Donate', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (8, 8, 'Edittor', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (9, 9, 'User', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (10, 10, 'gaust', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'en');
INSERT INTO "public"."sd_user_role" VALUES (11, 1, 'Dev', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (12, 2, 'Administrator', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (13, 3, 'Company', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (14, 4, 'Staff', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (15, 5, 'Helpdask', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (16, 6, 'Customer', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (17, 7, 'Donate', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (18, 8, 'Edittor', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (19, 9, 'User', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');
INSERT INTO "public"."sd_user_role" VALUES (20, 10, 'gaust', '2025-04-06 20:56:00.301605', '2025-04-06 20:56:00.301605', 1, 1, 1, 1, 'th');

-- ----------------------------
-- Table structure for sd_user_roles_access
-- ----------------------------
DROP TABLE IF EXISTS "public"."sd_user_roles_access";
CREATE TABLE "public"."sd_user_roles_access" (
  "create" timestamp(6) NOT NULL DEFAULT now(),
  "update" timestamp(6) NOT NULL DEFAULT now(),
  "role_id" int4 NOT NULL,
  "role_type_id" int4 NOT NULL
)
;

-- ----------------------------
-- Records of sd_user_roles_access
-- ----------------------------
INSERT INTO "public"."sd_user_roles_access" VALUES ('2021-05-05 09:23:46', '2021-05-05 09:23:48', 1, 1);
INSERT INTO "public"."sd_user_roles_access" VALUES ('2023-05-01 17:50:20', '2023-05-01 17:50:25', 2, 2);
INSERT INTO "public"."sd_user_roles_access" VALUES ('2023-05-01 17:50:59', '2023-05-01 17:51:03', 3, 3);
INSERT INTO "public"."sd_user_roles_access" VALUES ('2023-05-01 17:51:13', '2023-05-01 17:51:15', 4, 4);
INSERT INTO "public"."sd_user_roles_access" VALUES ('2023-05-01 17:51:23', '2023-05-01 17:51:25', 5, 5);
INSERT INTO "public"."sd_user_roles_access" VALUES ('2023-05-01 17:51:31', '2023-05-01 17:51:34', 5, 6);

-- ----------------------------
-- Table structure for sd_user_roles_permision
-- ----------------------------
DROP TABLE IF EXISTS "public"."sd_user_roles_permision";
CREATE TABLE "public"."sd_user_roles_permision" (
  "role_type_id" int4 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "detail" text COLLATE "pg_catalog"."default",
  "created" timestamp(6) NOT NULL DEFAULT now(),
  "updated" timestamp(6) DEFAULT now(),
  "insert" int4,
  "update" int4,
  "delete" int4,
  "select" int4,
  "log" int4,
  "config" int4,
  "truncate" int4
)
;
COMMENT ON COLUMN "public"."sd_user_roles_permision"."created" IS 'เพิ่มเมื่อ';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."updated" IS 'แก้ไขเมื่อ';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."insert" IS 'เพิ่มข้อมูล';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."update" IS 'แก้ไขข้อมูล';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."delete" IS 'ลบข้อมูล';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."select" IS 'ดูข้อมูล';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."log" IS 'จัดการประวัติ';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."config" IS 'ตั้งค่าระบบ';
COMMENT ON COLUMN "public"."sd_user_roles_permision"."truncate" IS 'ล้างข้อมูล';

-- ----------------------------
-- Records of sd_user_roles_permision
-- ----------------------------
INSERT INTO "public"."sd_user_roles_permision" VALUES (1, 'System Admin', 'All', '2021-05-05 09:23:32', '2021-05-05 09:23:33', 1, 1, 1, 1, 1, 1, 1);
INSERT INTO "public"."sd_user_roles_permision" VALUES (2, 'Admin Level', 'Admin access', '2021-05-09 19:52:04', '2021-05-09 19:52:09', 1, 1, 1, 1, 1, 0, 0);
INSERT INTO "public"."sd_user_roles_permision" VALUES (3, 'Customer Level', 'Customer access', '2021-05-09 19:52:30', '2021-05-09 19:52:32', 1, 1, 0, 1, 1, 0, 0);
INSERT INTO "public"."sd_user_roles_permision" VALUES (4, 'Support Level', 'Support access', '2021-07-16 16:05:01', '2022-12-30 15:16:05', 1, 1, 0, 1, 1, 0, 0);
INSERT INTO "public"."sd_user_roles_permision" VALUES (5, 'Employee Level', 'Employee access', '2021-07-16 16:06:18', '2022-12-30 15:16:07', 1, 1, 0, 1, 1, 0, 0);
INSERT INTO "public"."sd_user_roles_permision" VALUES (6, 'User Level', 'User access', '2021-07-16 16:07:14', '2022-12-30 15:16:10', 1, 1, 0, 1, 1, 0, 0);

-- ----------------------------
-- Function structure for uuid_generate_v1
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1"();
CREATE FUNCTION "public"."uuid_generate_v1"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v1mc
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1mc"();
CREATE FUNCTION "public"."uuid_generate_v1mc"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1mc'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v3
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v3"("namespace" uuid, "name" text);
CREATE FUNCTION "public"."uuid_generate_v3"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v3'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v4
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v4"();
CREATE FUNCTION "public"."uuid_generate_v4"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v4'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v5
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v5"("namespace" uuid, "name" text);
CREATE FUNCTION "public"."uuid_generate_v5"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v5'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_nil
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_nil"();
CREATE FUNCTION "public"."uuid_nil"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_nil'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_dns
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_dns"();
CREATE FUNCTION "public"."uuid_ns_dns"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_dns'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_oid
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_oid"();
CREATE FUNCTION "public"."uuid_ns_oid"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_oid'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_url
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_url"();
CREATE FUNCTION "public"."uuid_ns_url"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_url'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_x500
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_x500"();
CREATE FUNCTION "public"."uuid_ns_x500"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_x500'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sd_user_file_id_seq"
OWNED BY "public"."sd_user_file"."id";
SELECT setval('"public"."sd_user_file_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sd_user_role_id_seq"
OWNED BY "public"."sd_user_role"."id";
SELECT setval('"public"."sd_user_role_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table sd_user
-- ----------------------------
ALTER TABLE "public"."sd_user" ADD CONSTRAINT "PK_c804add3ec6e26d0bb85dd4b5b6" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sd_user_file
-- ----------------------------
ALTER TABLE "public"."sd_user_file" ADD CONSTRAINT "PK_bee867c384da15706056a6d4d79" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sd_user_role
-- ----------------------------
ALTER TABLE "public"."sd_user_role" ADD CONSTRAINT "PK_ce286bbce9874c345c85ba7c6e4" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sd_user_roles_access
-- ----------------------------
ALTER TABLE "public"."sd_user_roles_access" ADD CONSTRAINT "PK_ea1374b87e00872215780b096f7" PRIMARY KEY ("role_id", "role_type_id");

-- ----------------------------
-- Primary Key structure for table sd_user_roles_permision
-- ----------------------------
ALTER TABLE "public"."sd_user_roles_permision" ADD CONSTRAINT "PK_4df7386cc58a6712f2bef59c507" PRIMARY KEY ("role_type_id");

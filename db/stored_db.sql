INSERT INTO lab_center_categories (category,centerId)
SELECT category,1
FROM lab_category A
WHERE NOT EXISTS (
          SELECT category
          FROM lab_center_categories B
          WHERE A.category = B.category
     )


INSERT INTO center_unit_master (unit,centerId)
SELECT unit,1
FROM lab_unit_master A
WHERE NOT EXISTS (
          SELECT unit
          FROM center_unit_master B
          WHERE A.unit = B.unit
     )

      BEGIN;
INSERT INTO center_test_panel (centerId,testName,unitId)
SELECT 1,testName,unitId
FROM lab_test_panel A
WHERE NOT EXISTS (
          SELECT testName,unitId
          FROM center_test_panel B
          WHERE A.unitId = B.unitId AND A.testName = B.testName
     );
INSERT INTO lab_tests_subtypes_ranges (subtypeId, gender, lower_age,lower_age_period,upper_age,upper_age_period,lower_limit,upper_limit,words) 
 SELECT LAST_INSERT_ID(), gender, lower_age,lower_age_period,upper_age,upper_age_period,lower_limit,upper_limit,words
FROM lab_tests_subtypes_ranges A
WHERE NOT EXISTS (
          SELECT gender, lower_age,lower_age_period,upper_age,upper_age_period,lower_limit,upper_limit,words
          FROM lab_tests_subtypes_ranges B
          WHERE A.gender = B.gender AND A.lower_age = B.lower_age AND A.upper_age = B.upper_age
     );
COMMIT;


     BEGIN;
INSERT INTO users (username, password)
  VALUES('test', 'test');
INSERT INTO profiles (userid, bio, homepage) 
  VALUES(LAST_INSERT_ID(),'Hello world!', 'http://www.stackoverflow.com');
COMMIT;
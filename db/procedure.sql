BEGIN
INSERT INTO lab_center_categories (category,centerId)
SELECT category,centerId
FROM lab_category A
WHERE NOT EXISTS (
          SELECT category
          FROM lab_center_categories B
          WHERE A.category = B.category
     );


INSERT INTO center_unit_master (unit,centerId)
SELECT unit,centerId
FROM lab_unit_master A
WHERE NOT EXISTS (
          SELECT unit
          FROM center_unit_master B
          WHERE A.unit = B.unit
     );


INSERT INTO center_test_panel (centerId,testName,unitId)
SELECT centerId,testName,unitId
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

INSERT INTO center_test_master (categoryId,test_name,short_name,method,instrument,gender,fees,centerId,desc_text)
SELECT categoryId,test_name,short_name,method,instrument,gender,fees,centerId,desc_text
FROM lab_tests A
WHERE NOT EXISTS (
          SELECT categoryId,test_name,short_name,method,instrument,gender,fees,desc_text
          FROM center_test_master B
          WHERE A.categoryId = B.categoryId AND A.test_name = B.test_name AND A.gender=B.gender AND A.fees=B.fees
     );
INSERT INTO center_test_group_panel (testId, panelId, isgroup,label,flag_sequence,jsid) 
 SELECT LAST_INSERT_ID(), panelId, isgroup,label,flag_sequence,jsid
FROM lab_test_group_panel A
WHERE NOT EXISTS (
          SELECT panelId, isgroup,label,flag_sequence,jsid
          FROM center_test_group_panel B
          WHERE A.panelId = B.panelId AND A.isgroup = B.isgroup AND A.label = B.label
     );

COMMIT;
END
SELECT
	GROUP_CONCAT(
    CONCAT('<column name="', COLUMN_NAME, '" type="', 
	 CASE WHEN DATA_TYPE = 'int' 
	 		THEN 'integer' ELSE DATA_TYPE END, '"',' required="', 
	 CASE WHEN IS_NULLABLE = 'YES' 
	 		THEN 'true' ELSE 'false' END, '"',
	 IF(COLUMN_KEY = 'PRI', ' primaryKey="true"', ''), IF(EXTRA = 'auto_increment', ' autoIncrement="true"', ''),' />')
	 SEPARATOR '\n'
	 ) AS column_info
from INFORMATION_SCHEMA.COLUMNS
WHERE
    TABLE_NAME = 'sample_collection_data'; -- Replace with your table name

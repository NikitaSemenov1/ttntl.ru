from tt_parse import parse, group_points
import MySQLdb
from configuration import get_config
tt = parse()

config = get_config()
print(config)

conn = MySQLdb.connect(config['server'], 
						config['username'], 
						config['password'], 
						config['name'], 
						use_unicode=True, charset="utf8")
cursor = conn.cursor()

# print(cursor.fetchone())

print(tt['date'])
request = "UPDATE `date` SET `date`='%s'" % (tt['date'])
print(request)
cursor.execute(request)

print(tt)

for item in tt.items():
    if item[0] == 'date':
        continue
    lesson_id = 1
    for row in item[1]:
        request = "UPDATE `lessons` SET `tittle`='%s',`classroom`='%s',`teacher`='%s' WHERE `student_group`='%s' AND `lesson_id`=%s" % (row[0], row[2], row[1], item[0], lesson_id)
        print(request)
        cursor.execute(request)
        lesson_id += 1

conn.commit()

conn.close()

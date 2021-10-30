import json
import mysql.connector
import uuid

database = mysql.connector.connect(
    host="localhost",
    user="root",
    password="ayanali78941",
    database="hasnain_waleed_uni_scrape"
)
cursor = database.cursor()


def add_uni_data_db():
    SQL_MAIN = "INSERT INTO uni_data (uni_id, uni_name, ranking, image_link, sector, researchOutput, " \
               "student_currently_enrolled, scholarship_availability, faculty_count, link) " \
               "VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    SQL_POST = "INSERT INTO postgraduate (id, uni_id, name_course) VALUES (%s, %s, %s)"
    SQL_UNDER = "INSERT INTO undergraduate (id, uni_id, name_course) VALUES (%s, %s, %s)"
    file = open(
        "C:\\Users\\themg\\PycharmProjects\\Projects-For-Portfolio\\universities-data-scrape\\final_file-colab.json",
        encoding="utf8")
    json_pointer = json.load(file)
    for i in range(916, len(json_pointer)):
        current_object = json_pointer[i]

        name = current_object["name"]
        ranking = current_object["ranking"]
        link = current_object["link"]
        image_link = current_object["imageLink"]
        sector = current_object["sector"]
        research_output = current_object["researchOutput"]
        students_current = current_object["studentsCurrentlyEnrolled"]
        under_graduate = current_object["underGraduateOfferedCourses"]
        post_graduate = current_object["postGraduateOfferedCourses"]

        scholarship_availability = ''
        try:
            scholarship_availability = current_object["scholarshipAvailable"]
        except KeyError:
            pass
        faculty_count = ''
        try:
            faculty_count = current_object["facultyCount"]
        except KeyError:
            pass

        unique_uni_id = str(uuid.uuid4())
        values = (unique_uni_id, name, ranking, image_link, sector, research_output, students_current,
                  scholarship_availability, faculty_count, link)
        cursor.execute(SQL_MAIN, values)
        database.commit()

        for j in range(0, len(under_graduate)):
            unique_id_program = str(uuid.uuid4())
            values_under = (unique_id_program, unique_uni_id, under_graduate[j])
            cursor.execute(SQL_UNDER, values_under)
        database.commit()
        for k in range(0, len(post_graduate)):
            unique_id_program_post = str(uuid.uuid4())
            values_post = (unique_id_program_post, unique_uni_id, post_graduate[k])
            cursor.execute(SQL_POST, values_post)
        database.commit()

        if i % 100 == 0:
            print(f'{i} records done')


add_uni_data_db()

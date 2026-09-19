insert into students (first_name, last_name, email, date_of_birth) values
('ali', 'mohamed', 'ali@gmail.com', '2006-02-10'),
('hassan', 'ahmed', 'hassan@gmail.com', '2005-06-15'),
('mohamed', 'tarek', 'mohamed@gmail.com', '2006-10-22');

insert into instructors (first_name, last_name, email) values
('mohamed', 'hassan', 'mohamed.hassan@gmail.com'),
('ahmed', 'samir', 'ahmed.samir@gmail.com'),
('khaled', 'ali', 'khaled.ali@gmail.com');

update students
set email = 'ahmed.ali.new@gmail.com'
where id = 1;

insert into courses (course_name, instructor_id) values
('introduction to mysql', 1),
('php fundamentals', 1),
('database design', 2),
('web development', 2),
('backend development', 3);

insert into enrollments (student_id, course_id) values
(1, 1);

delete from enrollments
where student_id = 1 and course_id = 1;

select count(*) as total_students
from students;

select students.*
from students
join enrollments on students.id = enrollments.student_id
join courses on courses.id = enrollments.course_id
where courses.course_name = 'introduction to mysql';

select
    courses.course_name,
    (
        select concat(instructors.first_name, ' ', instructors.last_name)
        from instructors
        where instructors.id = courses.instructor_id
    ) as instructor_name
from courses;

select
    courses.course_name,
    count(enrollments.student_id) as total_students
from courses
left join enrollments on courses.id = enrollments.course_id
group by courses.id, courses.course_name;

select
    courses.course_name
from courses
join enrollments on courses.id = enrollments.course_id
join students on students.id = enrollments.student_id
where concat(students.first_name, ' ', students.last_name) = 'mazen mohamed';

select
    instructors.first_name,
    instructors.last_name
from instructors
join courses on instructors.id = courses.instructor_id
group by instructors.id, instructors.first_name, instructors.last_name
having count(courses.id) > 1;

select students.*
from students
left join enrollments on students.id = enrollments.student_id
where enrollments.student_id is null;

select
    instructors.first_name,
    instructors.last_name,
    count(courses.id) as total_courses
from instructors
left join courses on instructors.id = courses.instructor_id
group by instructors.id, instructors.first_name, instructors.last_name;

select avg(student_count) as average_students_per_course
from (
    select courses.id, count(enrollments.student_id) as student_count
    from courses
    left join enrollments on courses.id = enrollments.course_id
    group by courses.id
) as course_counts;

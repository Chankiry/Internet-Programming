import { Args, Mutation, Query, Resolver } from '@nestjs/graphql';

@Resolver('Student')
export class StudentResolver {
  private students = [
    {
      id: 1,
      name: 'John Doe',
      idCard: 'ID123',
      class: 'Math101',
    },
    {
      id: 2,
      name: 'John Doe2',
      idCard: 'ID124',
      class: 'Math101',
    },
    {
      id: 3,
      name: 'John Doe3',
      idCard: 'ID125',
      class: 'Math102',
    },
    {
      id: 4,
      name: 'John Doe4',
      idCard: 'ID126',
      class: 'Math102',
    },
  ];

  @Query('studentsByClass')
  getStudentsByClass(@Args('className') className: string) {
    return this.students.filter((student) => student.class === className);
  }

  @Mutation('enrollStudent')
  enrollStudent(
    @Args('name') name: string,
    @Args('idCard') idCard: string,
    @Args('class') className: string,
  ) {
    const sortedStudents = this.students.sort((a, b) => a.id - b.id);
    const lastId =
      sortedStudents.length > 0 ? sortedStudents[sortedStudents.length - 1].id : 0;
    const newStudent = {
      id: lastId + 1,
      name,
      idCard,
      class: className,
    };
    this.students.push(newStudent);
    return newStudent;
  }

  @Mutation('updateStudent')
  updateStudent(
    @Args('id') id: number,
    @Args('name') name: string,
    @Args('idCard') idCard: string,
    @Args('class') className: string,
  ) {
    const NumberId = Number(id);
    const studentIndex = this.students.findIndex((s) => s.id === NumberId);
    if (studentIndex === -1) throw new Error('Student not found');
    const updatedStudent = {
      ...this.students[studentIndex],
      name,
      idCard,
      class: className,
    };
    this.students[studentIndex] = updatedStudent;
    return updatedStudent;
  }

  @Mutation('removeStudent')
  removeStudent(@Args('id') id: number) {
    const NumberId = Number(id);
    const studentIndex = this.students.findIndex((s) => s.id === NumberId);
    if (studentIndex === -1) throw new Error('Student not found');
    const updatedStudent = {
      ...this.students[studentIndex],
      class: ''
    };
    this.students[studentIndex] = updatedStudent;
    return updatedStudent;
  }
}
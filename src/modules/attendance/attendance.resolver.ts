import { Args, Mutation, Query, Resolver } from '@nestjs/graphql';

@Resolver('Attendance')
export class AttendanceResolver {
  private attendances = [
    {
      session: 'string',
      status: 'P',
      student_id: 1,
      marker: 'string',
    }
  ];

  @Mutation('markAttendance')
  markAttendance(
    @Args('session') session: string,
    @Args('status') status: 'P' | 'AP' | 'L' | 'A',
    @Args('studentId') studentId: number,
    @Args('marker') marker: string,
  ) {
    const newEntry = {
      session,
      status,
      student_id: studentId,
      marker,
    };
    this.attendances.push(newEntry);
    return newEntry;
  }

  @Query('countAttendanceByClass')
  countAttendanceByClass(@Args('className') className: string) {
    const studentsInClass = this.attendances.filter((a) =>
      this.students.some((s) => s.id === a.student_id && s.class === className),
    );
    return studentsInClass.length;
  }

  @Query('countAttendanceByStudent')
  countAttendanceByStudent(@Args('studentId') studentId: number) {
    return this.attendances.filter((a) => a.student_id === studentId).length;
  }

  @Mutation('removeAttendance')
  removeAttendance(@Args('studentId') studentId: number, @Args('session') session: string) {
    const index = this.attendances.findIndex(
      (a) => a.student_id === studentId && a.session === session,
    );
    if (index === -1) return false;
    this.attendances.splice(index, 1);
    return true;
  }

  // Reference to students for class-based filtering
  private students = [
    { id: 1, name: 'John Doe', idCard: 'ID123', class: 'Math101' },
  ];
}
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
      a.student_id == this.students.filter( s => a.student_id == s.id && s.class == className)[0].id
    );
    let P = 0;
    let AP = 0;
    let L = 0;
    let A = 0;

    studentsInClass.map( at =>{
      if(at.status == 'P'){
          P++;
      }
      else if(at.status == 'AP'){
          AP++;
      }
      else if(at.status == 'L'){
          L++;
      }
      else if(at.status == 'A'){
          A++;
      }
    })

    const total = P + AP + L + A;
    return {
      P,
      AP,
      L,
      A,
      total
    };
  }

  @Query('countAttendanceByStudent')
  countAttendanceByStudent(@Args('studentId') studentId: number) {
    const studentAttendance = this.attendances.filter((s) => s.student_id === studentId );
    let P = 0;
    let AP = 0;
    let L = 0;
    let A = 0;

    studentAttendance.map( at =>{
      if(at.status == 'P'){
          P++;
      }
      else if(at.status == 'AP'){
          AP++;
      }
      else if(at.status == 'L'){
          L++;
      }
      else if(at.status == 'A'){
          A++;
      }
    })

    const total = P + AP + L + A;
    return {
      P,
      AP,
      L,
      A,
      total
    };
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
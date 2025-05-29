import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
} from '@nestjs/common';
import { TaskService } from './task.service';

@Controller('tasks')
export class TasksController {
  constructor(private readonly taskService: TaskService) {}

  @Get()
  getAllUser() {
    return this.taskService.findAll();
  }

  @Get('/:id')
  getTask(@Param('id') id: number) {
    return this.taskService.findOne(id);
  }

  @Post('/')
  createTask(@Body() body: any) {
    return this.taskService.create(body);
  }

  @Patch('/:id/done')
  markTaskAsDone(@Param('id') id: number) {
    return this.taskService.update(id, true);
  }

  @Patch('/:id/pending')
  markTaskAsPending(@Param('id') id: number) {
    return this.taskService.update(id, false);
  }

  @Delete('/:id')
  deleteTask(@Param('id') id: number) {
    return this.taskService.remove(id);
  }
}

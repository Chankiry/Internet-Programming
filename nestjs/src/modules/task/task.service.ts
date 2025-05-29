import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Task } from 'src/tasks/task.entity';
import { Repository } from 'typeorm';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private tasksRepo: Repository<Task>,
  ) {}
  
  create(taskData: Partial<Task>) {
    const task = this.tasksRepo.create(taskData);
    return this.tasksRepo.save(task);
  }

  findAll() {
    return this.tasksRepo.find();
  }

  findOne(id: number) {
    return this.tasksRepo.findOne({ where: { id } });
  }

  async update(id: number, is_complete: boolean = false) {
    const now = new Date();
    await this.tasksRepo.update(id, {
      completedAt: is_complete ? now : ''
    });
    return this.findOne(id);
  }

  remove(id: number) {
    return this.tasksRepo.delete(id);
  }
}

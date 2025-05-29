import {
  Get,
  Param,
  Controller,
  Post,
  Body,
  Patch,
  Delete,
} from '@nestjs/common';
import { UserService } from './user.service';
import { createUserDto } from './dto/create-user.dto';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UserService) {}

  @Get()
  getAllUser() {
    return this.userService.findAll();
  }

  @Get('/:id')
  getUser(@Param('id') id: number) {
    return this.userService.findOne(id);
  }

  @Post('/')
  createUser(@Body() body: createUserDto) {
    return this.userService.create(body);
  }

  @Patch('/:id')
  updateUser(
    @Param('id') id: number,
    @Body() body: { username: string; email: string; password: string },
  ) {
    return this.userService.update(id, body);
  }

  @Delete('/users/:id')
  deleteUser(@Param('id') id: number) {
    return this.userService.remove(id);
  }
}

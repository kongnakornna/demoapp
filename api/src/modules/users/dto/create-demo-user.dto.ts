import { ApiProperty } from '@nestjs/swagger';
import {
  IsBoolean,
  IsNotEmpty,
  IsString,
  IsEmail,
  IsEnum,
  IsNumber,
  IsStrongPassword,
} from 'class-validator';
import { USER_TYPE } from 'src/types';

export class CreateUserDemoDto {
  @ApiProperty({ description: 'role_ids' })
  @IsNumber()
  @IsNotEmpty()
  role_id: number = 5;

  @ApiProperty({ description: 'User name' })
  @IsString()
  @IsNotEmpty()
  username: string = 'system';

  @ApiProperty({ description: 'Email of login' })
  @IsString()
  @IsEmail()
  @IsNotEmpty()
  email: string = 'cmoniots@gmail.com';

  @ApiProperty({ description: 'Password' })
  @IsString()
  @IsNotEmpty()
  @IsStrongPassword({
    minLength: 8,
    minLowercase: 1,
    minNumbers: 1,
    minSymbols: 1,
    minUppercase: 1,
  })
  password: string = 'Na@0955@#';

  @ApiProperty({ description: 'active status' })
  @IsNumber()
  @IsNotEmpty()
  status: number = 99;

  @ApiProperty({ description: 'active status' })
  @IsNumber()
  @IsNotEmpty()
  active_status: number = 0;

  @ApiProperty({
    description: 'active status',
  })
  @IsNumber()
  loginfailed: number = 0;
}

import { registerAs } from '@nestjs/config';

export default registerAs('app', () => ({
  port: process.env.PORT ?? 3044,
  host: process.env.HOST ?? 'localhost',
}));

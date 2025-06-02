import helmet from 'helmet';
import { json } from 'express';
import { NestFactory } from '@nestjs/core';
import { ConfigService } from '@nestjs/config';
import { VersioningType, ValidationPipe } from '@nestjs/common';
import { SwaggerModule, DocumentBuilder } from '@nestjs/swagger';
import { AppModule } from '@src/app.module';
import 'dotenv/config';
require('dotenv').config();
const API_VERSION = '1';
//console.info(process.env)
async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  /** Use URI versioning
   * Routes will be in form
   * v1: http://0.0.0.0:3044/v1/users
   * v2: http://0.0.0.0:3044/v2/users
   */
  //app.setGlobalPrefix('cmon-api');
  app.enableVersioning({
    type: VersioningType.URI, //{{base_url}}/v1/auth/reset
    defaultVersion: API_VERSION, //v1
  });
  const origin =
    !process.env.ALLOWED_ORIGINS || process.env.ALLOWED_ORIGINS === '*'
      ? '*'
      : process.env.ALLOWED_ORIGINS.split(',');

  app.enableCors({ origin });
  app.useGlobalPipes(
    new ValidationPipe({
      transform: true,
      whitelist: true,
      forbidNonWhitelisted: true,
      transformOptions: { enableImplicitConversion: true },
    }),
  );
  // app.useGlobalPipes(new ValidationPipe({ transform: true, whitelist: true }));
  app.use(json({ limit: 'Infinity' }));
  /** Add Swagger. Can be accessed on process.env.API_URL/api e.g 0.0.0.0:3044/api
   * N.B The Add Server builds the default BASE_API when generating client types
   */
  const config = new DocumentBuilder()
    .setTitle('CmonIoT Auth Api Swagger Service')
    .setDescription('CmonIoT API')
    .setVersion('1.0.1')
    /*.addBearerAuth(
      { type: 'http', scheme: 'bearer', bearerFormat: 'JWT' },
      'default',
    )*/
    .addBearerAuth(
      { type: 'http', scheme: 'bearer', bearerFormat: 'Token' },
      'access-token',
    )
    .addServer(
      process.env.API_URL || `http://0.0.0.0:${process.env.APP_PORT}`,
    )
    .build();

  const document = SwaggerModule.createDocument(app, config);

  SwaggerModule.setup('/document', app, document, {
    swaggerOptions: {
      persistAuthorization: true,
    },
    customSiteTitle: 'CmonIoT Swagger Documentation',
    //customfavIcon: 'https://avatars.githubusercontent.com/u/6936373?s=200&v=4',
    customJs: [
      'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.15.5/swagger-ui-bundle.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.15.5/swagger-ui-standalone-preset.min.js',
    ],
    customCssUrl: [
      'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.15.5/swagger-ui.min.css',
      'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.15.5/swagger-ui-standalone-preset.min.css',
      'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.15.5/swagger-ui.css',
    ],
  });

  const configService = app.get<ConfigService>(ConfigService);
  app.use(helmet());
  await app.listen(configService.get<number>('app.port'), () => {
    console.log(
      `CmonIoT Nest app is listening on port ${configService.get<number>(
        'app.host',
      )} : ${configService.get<number>('app.port')}`,
    );
  });
}
bootstrap();

import * as dotenv from 'dotenv';
dotenv.config();
import {
  RequestMethod,
  MiddlewareConsumer,
  Module,
  NestModule,
} from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { ConfigModule, ConfigService } from '@nestjs/config';
import { AppService } from '@src/app.service';
import appConfig from '@src/config/app.config';
import { typeOrmAsyncConfig } from '@src/config/db/db';
import { PassportModule } from '@nestjs/passport';
import { TransformInterceptor } from '@root/interceptors/transform.interceptor';
import { RouterModule, APP_INTERCEPTOR, APP_GUARD } from '@nestjs/core';
import { AuthModule } from '@src/modules/auth/auth.module';
import { AuthGuard } from '@src/modules/auth/auth.guard';
import { ENV_CONSTANTS } from '@root/env.constants';
import { JwtService } from '@nestjs/jwt';
import { JwtModule } from '@nestjs/jwt';
//console.log('REDIS_HOST: '+process.env.REDIS_HOST)
import { redisStore, RedisCache } from 'cache-manager-redis-yet';
import { AppController } from '@src/app.controller';
/*******entity***********/
import { User } from '@src/modules/users/entities/user.entity';
/*******entity***********/
import { UserAuthModel } from '@src/modules/users/dto/user-auth.dto';
import { RedisModule } from '@src/modules/redis/redis.module';
import { SharedModule } from '@src/modules/shared/shared.module'; 
import { RolesModule } from './modules/roles/roles.module';

/******sqlite******/
import { sqliteBaseConfigs } from '@src/config/db/sqlitedatabases.config';
import { SequelizeModule } from '@nestjs/sequelize';
import { SqliteModule } from '@src/modules/sqlite/sqlite.module';
/******sqlite******/

const ENV = process.env.NODE_ENV;
console.log('NODE_ENV: '+ENV)

@Module({
  imports: [
    ConfigModule.forRoot({
      isGlobal: true,
      envFilePath: !ENV ? '.env.development' : `.env.${ENV}`,
    }),
    PassportModule.register({ defaultStrategy: 'jwt' }),
    TypeOrmModule.forRootAsync(typeOrmAsyncConfig),
    SequelizeModule.forRoot(sqliteBaseConfigs),
    // MongooseModule.forRootAsync({
    //     inject: [ConfigMongodbService],
    //     useFactory: async (ConfigMongodbService: ConfigMongodbService) => ConfigMongodbService.getMongoConfig(),
    // }),
    /*******entity***********/
    TypeOrmModule.forFeature([User]),
    AuthModule,
    UserAuthModel,
    RedisModule,
    SharedModule,
    ConfigModule.forRoot({
      load: [appConfig],
      cache: true,
      envFilePath: [process.env.ENV_FILE, '.env.development'],
    }),
    RouterModule.register([
      {
        path: '', //auth
        module: AuthModule,
      },
      {
        path: 'cache',
        module: RedisModule,
      },
      // {
      //   path: 'shared',
      //   module: SharedModule,
      // },
    ]),
    JwtModule.registerAsync({
      global: true,
      useFactory: () => ({}),
    }), 
    RolesModule, 
    SqliteModule,
    // MailModule,
  ],
  controllers: [AppController],
  providers: [
    AppService,
    JwtService,
    {
      provide: APP_INTERCEPTOR,
      useClass: TransformInterceptor,
    },
  ],
  exports: [AppService],
})
export class AppModule {}

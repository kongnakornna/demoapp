import {
  HttpStatus,
  Inject,
  Injectable,
  Logger,
  NotFoundException,
  UnprocessableEntityException,
  BadRequestException,
} from '@nestjs/common';
import * as bcrypt from 'bcrypt';
import { REQUEST } from '@nestjs/core';
import { Request } from 'express';
import { InjectRepository } from '@nestjs/typeorm';
import { ILike, In, Repository } from 'typeorm';
import { compact, isEmpty, uniqBy } from 'lodash';
/******** entity *****************/
import { User } from '@src/modules/users/entities/user.entity';
import { SdUserRole } from '@src/modules/users/entities/sduserrole.entity';   // เพิ่มบรรทัดนี้
import { UserFile } from '@src/modules/users/entities/file.entity';
import { SdUserRolesAccess } from '@src/modules/users/entities/rolesaccess.entity';
import { UserRolePermission } from '@src/modules/users/entities/userrolepermission.entity';
/******** entity ****************/
import { AuthService } from '@src/modules/auth/auth.service';
import { CreateUserDto } from '@src/modules/users/dto/create-user.dto';
import { ConfigService } from '@nestjs/config';
import { CreateUserDemoDto } from '@src/modules/users/dto/create-demo-user.dto';
import {
  getCurrentDateTimeForSQL,
  convertSortInput,
} from '@helpers/format.helper';
import * as moment from 'moment';
import {
  paginate,
  Pagination,
  IPaginationOptions,
} from 'nestjs-typeorm-paginate';

@Injectable()
export class UsersService {
  private readonly logger = new Logger(UsersService.name);
  constructor(
    @InjectRepository(User) private userRepository: Repository<User>,
    @InjectRepository(SdUserRole) private userroleRepository: Repository<SdUserRole>,
    @InjectRepository(UserFile)  private userfileRepository: Repository<UserFile>,
    @InjectRepository(SdUserRolesAccess)  private aduserRolesAccessRepository: Repository<SdUserRolesAccess>,
    @InjectRepository(UserRolePermission)  private userRolePermissionRepository: Repository<UserRolePermission>,
  ) {}
  async paginate(options: IPaginationOptions): Promise<Pagination<User>> {
    const queryBuilder = this.userRepository.createQueryBuilder('u');
    queryBuilder.orderBy('u.createddate', 'DESC'); // Or whatever you need to do
    /*
    https://github.com/nestjsx/nestjs-typeorm-paginate
          "items": [
            {
              "lives": 9,
              "type": "tabby",
              "name": "Bobby"
            },
            {
              "lives": 2,
              "type": "Ginger",
              "name": "Garfield"
            }, 
          ],
          "meta": {
            "itemCount": 10,
            "totalItems": 20,
            "itemsPerPage": 10,
            "totalPages": 5,
            "currentPage": 2
          },
          "links" : {
            "first": "http://cats.com/cats?limit=10",
            "previous": "http://cats.com/cats?page=1&limit=10",
            "next": "http://cats.com/cats?page=3&limit=10",
            "last": "http://cats.com/cats?page=5&limit=10"
          }
    */
    return paginate<User>(queryBuilder, options);
  }
  async listpaginate(dto: any): Promise<User> {
    console.log(`getProfile dto=`);
    console.info(dto);
    try {
      var idx: string = dto.idx || '';
      var keyword: any = dto.keyword || '';
      var status: any = dto.status || '1,88,99';
      var active_status: any = dto.active_status || '0,1';
      var sort: string = dto.sort;
      var page: number = dto.page || 1;
      var pageSize: number = dto.pageSize || 10;
      var isCount: number = dto.isCount || 0;
      const query: any = await this.userRepository.createQueryBuilder('u');
      if (isCount == 1) {
        var countRs: number = await query.getCount();
      } else {
        query.select([
          'u.id AS uid',
          'u.role_id AS role_id',
          'u.email AS email',
          'u.username AS username',
          'u.firstname AS firstname',
          'u.lastname AS lastname',
          'u.fullname AS fullname',
          'u.nickname AS nickname',
          'u.idcard AS idcard',
          'u.lastsignindate AS lastsignindate',
          'u.status AS status',
          'u.active_status AS active_status',
          'u.network_id AS network_id',
          'u.remark AS remark',
          'u.infomation_agree_status AS infomation_agree_status',
          'u.gender AS gender',
          'u.birthday AS birthday',
          'u.online_status AS online_status',
          'u.message AS message',
          'u.network_type_id AS network_type_id',
          'u.public_status AS public_status',
          'u.type_id AS type_id',
          'u.avatarpath AS avatarpath',
          'u.avatar AS avatar',
          'u.loginfailed AS loginFailed',
          'u.createddate AS createddate',
          'u.updateddate AS updateddate',
          'u.deletedate AS deletedate',
        ]);
      }
      query.where('1=1');
      if (keyword) {
        query.andWhere('u.username like :username', {
          username: keyword ? `%${keyword}%` : '%',
        });
      }
      if (idx) {
        query.andWhere('u.id=:id', { id: idx });
      }
      if (status) {
        //query.andWhere("u.status IN(:...status)", { status: [1,88,99] });
        const statusArray: any = status.split(',').map(Number);
        query.andWhere('u.status IN(:...status)', { status: statusArray });
      }
      if (active_status) {
        //query.andWhere('u.active_status=:active_status', {active_status: active_status});
        const statusArray: any = active_status.split(',').map(Number);
        query.andWhere('u.active_status IN(:...active_status)', {
          active_status: statusArray,
        });
      }
      query.printSql();
      query.maxExecutionTime(10000);
      query.getSql();
      if (isCount == 1) {
        // let tempCounts:any = {};
        // tempCounts.count = countRs;
        // return tempCounts.count;
        var count: any = await query.getCount();
        let tempCounts: any = {};
        tempCounts.count = countRs;
        console.log(`count =>` + count);
        console.log(`tempCounts.count =>` + tempCounts.count);
        return count;
      } else {
        // Sorting logic
        if (sort) {
          const sortResult = convertSortInput(sort);
          if (sortResult === false) {
            throw new BadRequestException(`Invalid sort option.`);
          }
          const { sortField, sortOrder } = sortResult;
          query.orderBy(
            `u.${sortField}`,
            sortOrder.toUpperCase() === 'DESC' ? 'DESC' : 'ASC',
          );
        } else {
          // Default sorting
          query.orderBy(`u.createddate`, 'ASC');
        }
        query.limit(pageSize);
        query.offset(pageSize * (page - 1));
        return await query.getRawMany();
      }
    } catch (error) {
      var error1: any = JSON.stringify(error);
      var error2: any = JSON.parse(error1);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          //args: { errorMessage: JSON.stringify(error) },
          args: { errorMessage: error2 },
        },
      });
    }
  }
  async getHash(password: string): Promise<string> {
    return await bcrypt.hash(password, 10);
  }
  async createsystem(user: CreateUserDemoDto): Promise<User> {
    // console.log('create user'); console.info(user);
    const password_chk: any = user.password;
    // console.log('password_chk'); console.info(password_chk);
    const userToCreate: any = {
      ...user,
      password: await this.getHash(user.password),
      password_temp: user.password,
      message: 'system',
      infomation_agree_status: 0,
    };
    const result: any = await this.userRepository.save(
      this.userRepository.create(userToCreate),
    );

    return result;
  }
  async create(user: CreateUserDto): Promise<User> {
    // console.log('create user');console.info(user);
    const password_chk: any = user.password;
    // console.log('password_chk');console.info(password_chk);
    const userToCreate: any = {
      ...user,
      password: await this.getHash(user.password),
      password_temp: user.password,
      message: 'Register',
      infomation_agree_status: 0,
      status: 1,
      active_status: 1,
    };
    // console.info(userToCreate);
    const result: any = await this.userRepository.save(
      this.userRepository.create(userToCreate),
    );
    return result;
  }
  async findByEmail(email: string): Promise<User> {
    // console.log('findByEmail email=>'+email);
    try {
      const result = await this.userRepository.findOne({
        where: { email },
      });
      return result;
    } catch (error) {
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          args: { errorMessage: JSON.stringify(error) },
        },
      });
    }
  }
  async finduserId(id: string): Promise<User> {
    try {
      const result = await this.userRepository.findOne({
        where: { id },
      });
      return result;
    } catch (error) {
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          args: { errorMessage: JSON.stringify(error) },
        },
      });
    }
  }
  async getUserGuard(id: string): Promise<User> {
    // console.log('getUserGuard id='+id);
    try {
      const user = await this.userRepository.findOne({
        where: {
          id,
        },
      });
      // console.log('getUserGuard=>');  console.info(user);
      const payload: any = {
        id: user.id,
        username: user.username,
        email: user.email,
        refresh_token: user.refresh_token,
      };
      const RefreshTokenChk: any = payload.refresh_token;
      //console.log('RefreshTokenChk='+RefreshTokenChk)
      if (RefreshTokenChk == null) {
        var rt: any = 0;
        //console.log(rt)
      } else {
        //console.log('1');
        var rt: any = 1; //payload.id;
      }
      // console.log('rt=>'+rt);
      return await rt;
    } catch (err) {
      this.logger.error(`Error ${JSON.stringify(err)}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: err.message,
        },
      });
    }
  }
  async getUser(id: string): Promise<User> {
    try {
      const user = await this.userRepository.findOne({
        where: {
          id,
        },
      });
      //console.log('getUser=>');console.info(user);
      return user;
    } catch (err) {
      this.logger.error(`Error ${JSON.stringify(err)}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: err.message,
        },
      });
    }
  }
  async getMeUser(id: string): Promise<User> {
    try {
      const user = await this.userRepository.findOne({
        where: {
          id,
        },
      });
      return user;
    } catch (err) {
      this.logger.error(`Error on getMeUser ${JSON.stringify(err)}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: err.message,
        },
      });
    }
  }
  async checkUserActive(idx: string): Promise<User> {
    console.log(`checkUserActive idx=`);
    console.info(idx);
    /*
          SELECT "u"."id" AS uid, "u"."role_id" AS role_id 
          FROM "public"."sd_user" "u" 
          WHERE 1=1 
          AND "u"."id"='3a493e74-cdc3-4060-8db2-220463a80f20'
          AND "u"."active_status"='1'
          AND "u"."status" IN(1,88,99)
          AND "u"."deletedate" IS NULL
        */
    try {
      const isCount: number = 1;
      const active_status: any = 1;
      var status: any = '1,88,99';
      const query: any = await this.userRepository.createQueryBuilder('u');
      if (isCount == 1) {
        var countRs: number = await query.getCount(['u.id AS uid']);
      } else {
        query.select(['u.id AS uid']);
      }
      query.where('1=1');
      if (idx) {
        query.andWhere('u.id=:id', { id: idx });
      }
      if (active_status) {
        query.andWhere('u.active_status=:active_status', {
          active_status: active_status,
        });
        query.andWhere('u.status IN(:...status)', { status: [1, 88, 99] });
      }
      // if (status) {
      //   //query.andWhere("u.status IN(:...status)", { status: [1,88,99] });
      //   const statusArray :any= status.split(',').map(Number);
      //   query.andWhere("u.status IN(:...status)", { status: statusArray });
      // }
      // if (active_status) {
      //   //query.andWhere('u.active_status=:active_status', {active_status: active_status});
      //   const statusArray :any= active_status.split(',').map(Number);
      //   query.andWhere("u.active_status IN(:...active_status)", { active_status: statusArray });
      // }
      query.printSql();
      query.maxExecutionTime(10000);
      query.getSql();
      if (isCount == 1) {
        var count: any = await query.getCount();
        let tempCounts: any = {};
        tempCounts.count = countRs;
        console.log(`count =>` + count);
        console.log(`tempCounts.count =>` + tempCounts.count);
        // return tempCounts.count;
        return count;
      } else {
        query.orderBy(`u.createddate`, 'ASC');
        var rs: any = await query.getRawMany();
        console.log(`rs =>` + rs);
        return rs;
      }
    } catch (error) {
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          args: { errorMessage: JSON.stringify(error) },
        },
      });
    }
  }
  async getProfile(idx: string): Promise<User> {
    console.log(`getProfile idx=`);
    console.info(idx);
    try {
      // const result = await this.userRepository.findOne({
      //   where: { email },
      // });
      // return result;'

      const query: any = await this.userRepository.createQueryBuilder('u');
      query.select([
        'u.id AS uid',
        'u.role_id AS roleid',
        'u.email AS email',
        'u.username AS username',
        'u.firstname AS firstname',
        'u.lastname AS lastname',
        'u.fullname AS fullname',
        'u.nickname AS nickname',
        'u.idcard AS idcard',
        'u.lastsignindate AS lastsignindate',
        'u.status AS status',
        'u.active_status AS active_status',
        'u.network_id AS network_id',
        'u.remark AS remark',
        'u.infomation_agree_status AS infomation_agree_status',
        'u.gender AS gender',
        'u.birthday AS birthday',
        'u.online_status AS online_status',
        'u.message AS message',
        'u.network_type_id AS network_type_id',
        'u.public_status AS public_status',
        'u.type_id AS type_id',
        'u.avatarpath AS avatarpath',
        'u.avatar AS avatar',
        'u.loginfailed AS loginFailed',
        'u.refresh_token AS refresh_token',
        'u.createddate AS createddate',
        'u.updateddate AS updateddate',
        'u.deletedate AS deletedate',
        'u.public_notification AS public_notification',
        'u.sms_notification AS sms_notification',
        'u.email_notification AS email_notification',
        'u.line_notification AS line_notification',
        'u.lineid AS lineid',
        'u.mobile_number AS mobile_number',
        'u.phone_number AS phone_number',
        'role.title AS rolename',
        'access.role_type_id AS role_type_id',
        'permision.name  AS permision_name',
        'permision.detail  AS permision_detail',
        'permision.created  AS permision_created',
        'permision.updated  AS permision_updated',
        'permision.insert  AS permision_insert',
        'permision.update  AS permision_update',
        'permision.delete  AS permision_delete',
        'permision.select  AS permision_select',
        'permision.log  AS permision_log',
        'permision.config  AS permision_config',
        'permision.truncate  AS permision_truncate', 
      ]);
      query.innerJoin(
                        "sd_user_role",
                        "role",
                        "u.role_id = role.role_id"
                    ); 
      query.leftJoin(
                        "sd_user_roles_access",
                        "access",
                        "role.role_id = access.role_type_id"
                    ); 
       query.leftJoin(
                        "sd_user_roles_permision",
                        "permision",
                        "access.role_type_id = permision.role_type_id"
                    ); 

      query.where('1=1');
      query.andWhere('u.id=:id', { id: idx });
      query.andWhere('u.status IN(:...status)', { status: [1, 88, 99] });
      query.printSql();
      query.maxExecutionTime(10000);
      query.getSql();
      // let count:any = await query.getCount();
      let rs: any = await query.getRawMany();
      // console.info(query);
      // console.log(`Counts=`, count);
      // console.log(`rs=`); console.info(rs);

      return rs;
    } catch (error) {
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          args: { errorMessage: JSON.stringify(error) },
        },
      });
    }
  }
  async getTokenUser(refresh_token: string): Promise<User> {
    try {
      const user = await this.userRepository.findOne({
        where: {
          refresh_token,
        },
      });
      let idx: any = user.id;
      return idx;
    } catch (err) {
      this.logger.error(`Error on getMeUser ${JSON.stringify(err)}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          //errorMessage: err.message,
          message: 'Token Invalid! Or Token Expired..',
        },
      });
    }
  }
  async getUserByusername(username: string): Promise<User> {
    // const user = await this.userRepository.findOne({
    //   where: {
    //     username,
    //   },
    // });
    // return user;

    try {
      // const result = await this.userRepository.findOne({
      //   where: { email },
      // });
      // return result;
      const query: any = await this.userRepository.createQueryBuilder('u');
      query.select([
        'u.id AS uid',
        'u.role_id AS roleid',
        'u.email AS email',
        'u.username AS username',
        'u.firstname AS firstname',
        'u.lastname AS lastname',
        'u.fullname AS fullname',
        'u.nickname AS nickname',
        'u.idcard AS idcard',
        'u.lastsignindate AS lastsignindate',
        'u.status AS status',
        'u.active_status AS active_status',
        'u.network_id AS network_id',
        'u.remark AS remark',
        'u.infomation_agree_status AS infomation_agree_status',
        'u.gender AS gender',
        'u.birthday AS birthday',
        'u.online_status AS online_status',
        'u.message AS message',
        'u.network_type_id AS network_type_id',
        'u.public_status AS public_status',
        'u.type_id AS type_id',
        'u.avatarpath AS avatarpath',
        'u.avatar AS avatar',
        'u.refresh_token AS refresh_token',
        'u.createddate AS createddate',
        'u.updateddate AS updateddate',
        'u.deletedate AS deletedate',
        'u.loginfailed AS loginfailed',
      ]);
      query.where('1=1');
      query.andWhere('u.username=:username', { username: username });
      query.printSql();
      query.maxExecutionTime(10000);
      query.getSql();
      let count: any = await query.getCount();
      console.log(`count=`);
      console.info(count);
      let rs: any = await query.getRawMany();
      console.log(`rs=`);
      console.info(rs);
      if (count != 0) {
        return rs;
      } else {
        return null;
      }
    } catch (error) {
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          args: { errorMessage: JSON.stringify(error) },
        },
      });
    }
  }
  async getUserByusernameauth(username: string): Promise<User> {
    const user = await this.userRepository.findOne({
      where: {
        username,
      },
    });

    if (user) {
      // console.log('1-user=>');console.info(user);
      return user;
    } else {
      // console.log('2-user=>');console.info(user);
      return user;
    }
  }
  async getUserByEmail(email: string): Promise<User> {
    const user = await this.userRepository.findOne({
      where: {
        email,
      },
    });

    if (user) {
      // console.log('1-user=>');console.info(user);
      return user;
    } else {
      // console.log('2-user=>');console.info(user);
      return user;
    }
  }
  async createUser(userBody: CreateUserDto): Promise<User> {
    try {
      let user = null;

      return user;
    } catch (err) {
      //TODO: Needs to implement custom Error handling in NestJS
      this.logger.error(`Error ${JSON.stringify(err)}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: err.message,
        },
      });
    }
  }
  async deleteUser(userId: string): Promise<void> {
    try {
      this.logger.log(`Deleting user with Id: ${userId}`);
      const user = await this.getUser(userId);
      if (!user) {
        throw new NotFoundException(`User with id ${userId} not found`);
      }

      await this.userRepository.delete(userId);
    } catch (error) {
      this.logger.error(`Error while deleting user = ${error}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: error.message,
        },
      });
    }
  }
  async compareHash(password: string, hash: string): Promise<boolean> {
    return await bcrypt.compare(password, hash);
  }
  async updaterefreshtoken(userId: string, refresh_token: string) {
    return await this.userRepository.update({ id: userId }, { refresh_token });
  }
  async updatereloginfailed(userId: string, loginfailed: number) {
    return await this.userRepository.update({ id: userId }, { loginfailed });
  }
  async createNewSdUser(user: CreateUserDto): Promise<User> {
    // console.log('create user');console.info(user);
    const password_chk: any = user.password;
    // console.log('password_chk'); console.info(password_chk);
    const userToCreate: any = {
      ...user,
      password: await this.getHash(user.password),
      password_temp: user.password,
      message: 'Register',
      infomation_agree_status: 0,
    };
    //console.info(userToCreate);
    const result: any = await this.userRepository.save(
      this.userRepository.create(userToCreate),
    );
    return result;
  }
  async updateSdUser(dto) {
    // const idx:any = JSON.parse(dto.id);
    let idx = dto.id;
    const DataUpdate: any = {};
    // const dataRs = await this.userRepository.findOne({where: { id: idx } });
    const query: any = await this.userRepository.createQueryBuilder('u');
    query.select(['u.id AS uid', 'u.role_id AS roleid']);
    query.where('1=1');
    query.andWhere('u.id=:id', { id: idx });
    query.printSql();
    query.maxExecutionTime(10000);
    query.getSql();
    let count: any = await query.getCount();
    let dataRs: any = await query.getRawMany();
    // console.info(dto)
    // return dto
    if (!dataRs) {
      throw new NotFoundException(`Data with ID ${idx} not found`);
      var result: any = {
        statusCode: 200,
        code: 422,
        message: `Data not found UserID ${idx}.`,
        message_th: `ไม่พบข้อมูล UserID ${idx}.`,
        payload: null,
      };
      return result;
    } else {
      // console.log('idx =>'+idx);  console.log(`count=`); console.info(count);
      // console.log('**************** dataRs =>'+dataRs+'****************');
      // console.info(dataRs);
    }
    if (dto.role_id) {
      DataUpdate.role_id = dto.role_id;
    }
    if (dto.email) {
      DataUpdate.email = dto.email;
    }
    if (dto.username) {
      DataUpdate.username = dto.username;
    }
    if (dto.password) {
      DataUpdate.password = await this.getHash(dto.password);
    }
    if (dto.password) {
      DataUpdate.password_temp = dto.password;
    }
    if (dto.firstname) {
      DataUpdate.firstname = dto.firstname;
    }
    if (dto.lastname) {
      DataUpdate.lastname = dto.lastname;
    }
    if (dto.fullname) {
      DataUpdate.fullname = dto.fullname;
    }
    if (dto.nickname) {
      DataUpdate.nickname = dto.nickname;
    }
    if (dto.idcard) {
      DataUpdate.idcard = dto.idcard;
    }
    if (dto.lastsignindate) {
      DataUpdate.lastsignindate = dto.lastsignindate;
    }
    if (dto.status) {
      DataUpdate.status = dto.status;
    }
    if (dto.active_status) {
      DataUpdate.active_status = dto.active_status;
    }
    if (dto.network_id) {
      DataUpdate.network_id = dto.network_id;
    }
    if (dto.remark) {
      DataUpdate.remark = dto.remark;
    }
    if (dto.infomation_agree_status) {
      DataUpdate.infomation_agree_status = dto.infomation_agree_status;
    }
    if (dto.gender) {
      DataUpdate.gender = dto.gender;
    }
    if (dto.birthday) {
      DataUpdate.birthday = dto.birthday;
    }
    if (dto.online_status) {
      DataUpdate.online_status = dto.online_status;
    }
    if (dto.message) {
      DataUpdate.message = dto.message;
    }
    if (dto.network_type_id) {
      DataUpdate.network_type_id = dto.network_type_id;
    }
    if (dto.public_status) {
      DataUpdate.public_status = dto.public_status;
    }
    if (dto.type_id) {
      DataUpdate.type_id = dto.type_id;
    }
    if (dto.avatarpath) {
      DataUpdate.avatar = dto.avatarpath;
    }
    if (dto.avatar) {
      DataUpdate.avatar = dto.avatar;
    }
    if (dto.refresh_token) {
      DataUpdate.refresh_token = dto.refresh_token;
    }
    if (dto.createddate) {
      DataUpdate.createddate = dto.createddate;
    }
    if (dto.updateddate) {
      // DataUpdate.updateddate =dto.updateddate;
    }
    const DATE_TIME_FORMAT = 'YYYY-MM-DDTHH:mm';
    const updateddate = moment(new Date(), DATE_TIME_FORMAT);
    DataUpdate.updateddate = Date();
    if (dto.deletedate) {
      DataUpdate.deletedate = dto.deletedate;
    }
    if (dto.loginfailed) {
      DataUpdate.loginfailed = dto.loginfailed;
    }

    if (dto.public_notification) {
        DataUpdate.public_notification = dto.public_notification;
    }

    if (dto.sms_notification) {
        DataUpdate.sms_notification = dto.sms_notification;
    }

    if (dto.email_notification) {
        DataUpdate.email_notification = dto.email_notification;
    }

    if (dto.line_notification) {
        DataUpdate.line_notification = dto.line_notification;
    }

    if (dto.lineid) {
        DataUpdate.lineid = dto.lineid;
    }

    if (dto.mobile_number) {
          DataUpdate.mobile_number = dto.mobile_number;
    }

    if (dto.phone_number) {
          DataUpdate.phone_number = dto.phone_number;
    }
    // console.log('update DataUpdate'); console.info(DataUpdate);
    await this.userRepository
      .createQueryBuilder()
      .update(User)
      .set(DataUpdate)
      .where('id=:id', { id: idx })
      .execute();
    // var result:any ={
    //     statusCode: 200
    //     ,code: 200
    //     ,message: `Update User ID  ${idx} Successful.`
    //     ,message_th: `อัปเดต  UserID ${idx} สำเร็จ.`
    //     ,payload:null
    // }
    // return result;
    return 200;
  }
  async resetPassword(dto) {
    let idx = dto.id;
    const DataUpdate: any = {};
    const dataRs = await this.userRepository.findOne({
      where: { id: idx },
    });
    // console.log('idx =>'+idx)
    // console.log('dataRs =>')
    // console.info(dataRs)
    // console.info(dto)
    // return dto
    if (!dataRs) {
      throw new NotFoundException(`Data with ID ${idx} not found`);
    }
    if (dto.password) {
      DataUpdate.password = await this.getHash(dto.password);
    }
    if (dto.password) {
      DataUpdate.password_temp = dto.password;
    }
    // console.log('idx =>'+idx)
    // console.log('DataUpdate =>')
    // console.info(DataUpdate)
    // return dto
    await this.userRepository
      .createQueryBuilder()
      .update(User)
      .set(DataUpdate)
      .where('id=:id', {
        id: idx,
      })
      .execute();
    return dto.id;
  }

  async logout(userId: string, refresh_token: string) {
    return await this.userRepository.update({ id: userId }, { refresh_token });
  }
  async remove(userId: string): Promise<void> {
    try {
      this.logger.log(`Deleting user with Id: ${userId}`);
      const user = await this.getUser(userId);
      if (!user) {
        throw new NotFoundException(`User with id ${userId} not found`);
      }
      await this.userRepository.delete(userId);
    } catch (error) {
      this.logger.error(`Error while deleting user = ${error}`);
      throw new UnprocessableEntityException({
        status: HttpStatus.UNPROCESSABLE_ENTITY,
        error: {
          errorMessage: error.message,
        },
      });
    }
  }
}

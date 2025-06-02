import { Module } from '@nestjs/common';
import { RolesService } from '@src/modules/roles/roles.service';
import { RolesController } from '@src/modules/roles/roles.controller';

@Module({
  controllers: [RolesController],
  providers: [RolesService],
})
export class RolesModule {}

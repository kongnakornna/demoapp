import { Module } from '@nestjs/common';
import { SharedService } from '@src/modules/shared/shared.service';
import { SharedController } from '@src/modules/shared/shared.controller';
import 'dotenv/config';
require('dotenv').config();
console.log(
  '--------------------------:SharedModule:--------------------------',
);
@Module({
  providers: [SharedService],
  exports: [SharedService],
  controllers: [SharedController],
})
export class SharedModule {}

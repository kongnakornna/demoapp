export const enum PasswordCheckStrength {
  Short,
  Common,
  Weak,
  Ok,
  Strong,
}
const moment = require('moment');
const tz = require('moment-timezone');
const passwordConfig = Object.freeze({
  minLength: 8,
  atleaseOneLowercaseChar: true,
  atleaseOneUppercaseChar: true,
  atleaseOneDigit: true,
  atleaseOneSpecialChar: true,
});

export function getRandomString(length: any) {
  var randomChars: any =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
  // var randomChars2: any =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function timeConverter(UNIX_timestamp: any) {
  var a = new Date(UNIX_timestamp * 1000);
  var months = [
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',
    'Jul',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec',
  ];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time =
    date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec;
  return time;
}
export function toThaiDate(date: any) {
  let monthNames = [
    'ม.ค.',
    'ก.พ.',
    'มี.ค.',
    'เม.ย.',
    'พ.ค.',
    'มิ.ย.',
    'ก.ค.',
    'ส.ค.',
    'ก.ย.',
    'ต.ค.',
    'พ.ย.',
    'ธ.ค.',
  ];
  let year = date.getFullYear() + 543;
  let month = monthNames[date.getMonth()];
  let numOfDay = date.getDate();
  let hour = date.getHours().toString().padStart(2, '0');
  let minutes = date.getMinutes().toString().padStart(2, '0');
  let second = date.getSeconds().toString().padStart(2, '0');
  return `${numOfDay} ${month} ${year} ` + `${hour}:${minutes}:${second} น.`;
}
export function toEnDate(date: any) {
  let monthNames = [
    'Jan.',
    'Feb.',
    'Mar.',
    'Apr.',
    'May.',
    'Jun.',
    'Jul.',
    'Aug.',
    'Sept.',
    'Oct.',
    'Nov.',
    'Dec.',
  ];
  let monthNameslong = [
    'January',
    'February',
    'March.',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
  ];
  let year = date.getFullYear() + 0;
  let month = monthNameslong[date.getMonth()];
  let numOfDay = date.getDate();
  let hour = date.getHours().toString().padStart(2, '0');
  let minutes = date.getMinutes().toString().padStart(2, '0');
  let second = date.getSeconds().toString().padStart(2, '0');
  return `${numOfDay} ${month} ${year} ` + `${hour}:${minutes}:${second}`;
}
export function getRandomint(length: any) {
  var randomChars: any = '0123456789';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function convertToTwoDecimals(num: any) {
  return parseFloat(num.toFixed(2)); // Convert the string back to a number
}
export function getRandomsrtsmall(length: any) {
  var randomChars: any = 'abcdefghijklmnopqrstuvwxyz';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function getRandomsrtsmallandint(length: any) {
  var randomChars: any = 'abcdefghijklmnopqrstuvwxyz0123456789';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function getRandomsrtbig(length: any) {
  var randomChars: any = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function getRandomsrtbigandsmall(length: any) {
  var randomChars: any =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-!#@';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function convertDatetime(utcString: any) {
  const date = new Date(utcString);
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, '0');
  const day = date.getDate().toString().padStart(2, '0');
  const hours = date.getHours().toString().padStart(2, '0');
  const minutes = date.getMinutes().toString().padStart(2, '0');
  const seconds = date.getSeconds().toString().padStart(2, '0');
  return `${year}-${month}-${day}:${hours}:${minutes}:${seconds}`;
  /*
    // Example usage:
      const utcDatetime = "2025-04-08T13:05:25.000Z";
      const convertedDatetime = convertDatetime(utcDatetime);
      consol
    */
}
export function convertTZ(date: any, tzString: any) {
  var time: any = new Date(
    (typeof date === 'string' ? new Date(date) : date).toLocaleString('en-US', {
      timeZone: tzString,
    }),
  );
  return time;
  /*
          function convertTZ(date, tzString) {
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
        }

        // usage: Asia/Jakarta is GMT+7
        convertTZ("2012/04/20 10:10:30 +0000", "Asia/Jakarta") // Tue Apr 20 2012 17:10:30 GMT+0700 (Western Indonesia Time)

        // Resulting value is regular Date() object
        const convertedDate = convertTZ("2012/04/20 10:10:30 +0000", "Asia/Jakarta") 
        convertedDate.getHours(); // 17

        // Bonus: You can also put Date object to first arg
        const date = new Date()
        convertTZ(date, "Asia/Jakarta") // current date-time in jakarta.
    */
}
export function timeConvertermas(a: any) {
  let year: any = a.getFullYear();
  var month: any = (a.getMonth() + 1).toString().padStart(2, '0');
  var date: any = a.getDate().toString().padStart(2, '0');
  var hour: any = a.getHours().toString().padStart(2, '0');
  var min: any = a.getMinutes().toString().padStart(2, '0');
  var sec: any = a.getSeconds().toString().padStart(2, '0');
  //var time: any = date + '-' + month + '-' + year + ' ' + hour + ':' + min + ':' + sec;
  var time: any =
    year + '-' + month + '-' + date + ' ' + hour + ':' + min + ':' + sec;
  //console.log('timeConvertermas a: ' + a)
  //console.log('timeConvertermas time: ' + time)
  return time;
}
export function timeConvertermas2(a: any) {
  let year: any = a.getFullYear();
  var month: any = (a.getMonth() + 1).toString().padStart(2, '0');
  var date: any = a.getDate().toString().padStart(2, '0');
  var hour: any = a.getHours().toString().padStart(2, '0');
  var min: any = a.getMinutes().toString().padStart(2, '0');
  var sec: any = a.getSeconds().toString().padStart(2, '0');
  var time: any =
    date + '-' + month + '-' + year + ' ' + hour + ':' + min + ':' + sec;
  return time;
}
export function checkEmails(email: any) {
  //console.log('email: ' + email)
  const filter =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  //console.log('email_filter: ' + filter);
  if (!filter.test(email)) {
    return false;
  } else {
    return true;
  }
}
export function CurrentDateTimeForSQL() {
  const now = new Date();
  return now.toISOString();
}
export function getCurrentDateTimeForSQL() {
  const now = new Date();
  return now.toISOString();
}
export function toSnakeCaseUpper(str: string): string {
  return str.replace(/[A-Z]/g, (letter) => `_${letter}`).toUpperCase();
}
export function convertSortInput(
  str: string,
): { sortField: string; sortOrder: string } | false {
  // Split the string by '-'
  const parts = str.split('-');

  // Check if the split parts meet the required conditions
  if (parts.length !== 2 || !parts[0] || !parts[1]) {
    return false;
  }

  // Convert the first part to snake case upper
  const sortField = parts[0]
    .replace(/[A-Z]/g, (letter) => `_${letter}`)
    .toUpperCase();

  // Convert the second part to upper case
  const sortOrder = parts[1].toUpperCase();

  // Check if the second part is 'ASC' or 'DESC'
  if (sortOrder !== 'ASC' && sortOrder !== 'DESC') {
    return false;
  }

  return { sortField, sortOrder };
}
export function getRandomStrings(length: any) {
  var randomChars: any =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#';
  var result: any = '';
  for (var i = 0; i < length; i++) {
    result += randomChars.charAt(
      Math.floor(Math.random() * randomChars.length),
    );
  }
  return result;
}
export function checkEmail(email: any) {
  //console.log('email: ' + email)
  const filter =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  //console.log('email_filter: ' + filter);
  if (!filter.test(email)) {
    return false;
  } else {
    return true;
  }
}

export function MinimumLength(): number {
  return 8;
}

export function isPasswordCommon(password: string): boolean {
  return this.commonPasswordPatterns.test(password);
}

export function checkPasswordStrength1(password) {
  if (passwordConfig.minLength && password.length < passwordConfig.minLength) {
    throw new Error(
      `Your password must be at least ${passwordConfig.minLength} characters`,
    );
  }

  if (passwordConfig.atleaseOneLowercaseChar && password.search(/[a-z]/i) < 0) {
    throw new Error(
      'Your password must contain at least one lowercase character.',
    );
  }

  if (passwordConfig.atleaseOneUppercaseChar && password.search(/[A-Z]/) < 0) {
    throw new Error(
      'Your password must contain at least one uppercase character.',
    );
  }

  if (passwordConfig.atleaseOneDigit && password.search(/[0-9]/) < 0) {
    throw new Error('Your password must contain at least one digit.');
  }

  if (passwordConfig.atleaseOneSpecialChar && password.search(/\W/) < 0) {
    throw new Error(
      'Your password must contain at least one special character.',
    );
  }
}

export function checkPasswordStrength(password: any): PasswordCheckStrength {
  // Build up the strenth of our password
  let numberOfElements = 0;
  numberOfElements = /.*[a-z].*/.test(password)
    ? ++numberOfElements
    : numberOfElements; // Lowercase letters
  numberOfElements = /.*[A-Z].*/.test(password)
    ? ++numberOfElements
    : numberOfElements; // Uppercase letters
  numberOfElements = /.*[0-9].*/.test(password)
    ? ++numberOfElements
    : numberOfElements; // Numbers
  numberOfElements = /[^a-zA-Z0-9]/.test(password)
    ? ++numberOfElements
    : numberOfElements; // Special characters (inc. space)

  // Assume we have a poor password already
  let currentPasswordStrength = PasswordCheckStrength.Short;

  // Check then strenth of this password using some simple rules
  if (password === null || password.length) {
    currentPasswordStrength = PasswordCheckStrength.Short;
  } else if (this.isPasswordCommon(password) === true) {
    currentPasswordStrength = PasswordCheckStrength.Common;
  } else if (
    numberOfElements === 0 ||
    numberOfElements === 1 ||
    numberOfElements === 2
  ) {
    currentPasswordStrength = PasswordCheckStrength.Weak;
  } else if (numberOfElements === 3) {
    currentPasswordStrength = PasswordCheckStrength.Ok;
  } else {
    currentPasswordStrength = PasswordCheckStrength.Strong;
  }

  // Return the strength of this password
  return currentPasswordStrength;
}

export function generatePassword(passwordLength: number) {
  var numberChars = '0123456789';
  var upperChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var lowerChars = 'abcdefghijklmnopqrstuvwxyz';
  var vaChars = '!@#$%^&*';
  var allChars = numberChars + upperChars + lowerChars + vaChars;
  var randPasswordArray = Array(passwordLength);
  randPasswordArray[0] = numberChars;
  randPasswordArray[1] = upperChars;
  randPasswordArray[2] = lowerChars;
  randPasswordArray = randPasswordArray.fill(allChars, 3);
  return shuffleArray(
    randPasswordArray.map(function (x) {
      return x[Math.floor(Math.random() * x.length)];
    }),
  ).join('');
}

export function passwordValidator(inputtxt: string) {
  var paswd: string =
    '^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})';
  if (inputtxt.match(paswd)) {
    //console.log('Your validate password  Correct:'+inputtxt);
    return true;
  } else {
    //console.log('You validate password Wrong :'+inputtxt);
    return false;
  }
}

export function shuffleArray(array: any) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
  return array;
}

export function shuffleArrayIfId(array: any, id: number) {
  return array.includes(id);
}

/* This is a generated file, edit the .stub.php file instead.
 * Stub hash: f45116785b01842f56ff923a54f65ab839b3dd61 */

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_cal_days_in_month, 0, 3, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, calendar, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, month, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, year, IS_LONG, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_cal_from_jd, 0, 2, IS_ARRAY, 0)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, calendar, IS_LONG, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_cal_info, 0, 0, IS_ARRAY, 0)
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, calendar, IS_LONG, 0, "-1")
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_cal_to_jd, 0, 4, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, calendar, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, month, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, year, IS_LONG, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_easter_date, 0, 0, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, year, IS_LONG, 1, "null")
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, mode, IS_LONG, 0, "CAL_EASTER_DEFAULT")
ZEND_END_ARG_INFO()

#define arginfo_easter_days arginfo_easter_date

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_frenchtojd, 0, 3, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, month, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, year, IS_LONG, 0)
ZEND_END_ARG_INFO()

#define arginfo_gregoriantojd arginfo_frenchtojd

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_MASK_EX(arginfo_jddayofweek, 0, 1, MAY_BE_LONG|MAY_BE_STRING)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, mode, IS_LONG, 0, "CAL_DOW_DAYNO")
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_jdmonthname, 0, 2, IS_STRING, 0)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, mode, IS_LONG, 0)
ZEND_END_ARG_INFO()

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_jdtofrench, 0, 1, IS_STRING, 0)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
ZEND_END_ARG_INFO()

#define arginfo_jdtogregorian arginfo_jdtofrench

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_jdtojewish, 0, 1, IS_STRING, 0)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, hebrew, _IS_BOOL, 0, "false")
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, flags, IS_LONG, 0, "0")
ZEND_END_ARG_INFO()

#define arginfo_jdtojulian arginfo_jdtofrench

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_INFO_EX(arginfo_jdtounix, 0, 1, IS_LONG, 0)
	ZEND_ARG_TYPE_INFO(0, julian_day, IS_LONG, 0)
ZEND_END_ARG_INFO()

#define arginfo_jewishtojd arginfo_frenchtojd

#define arginfo_juliantojd arginfo_frenchtojd

ZEND_BEGIN_ARG_WITH_RETURN_TYPE_MASK_EX(arginfo_unixtojd, 0, 0, MAY_BE_LONG|MAY_BE_FALSE)
	ZEND_ARG_TYPE_INFO_WITH_DEFAULT_VALUE(0, timestamp, IS_LONG, 1, "null")
ZEND_END_ARG_INFO()

ZEND_FUNCTION(cal_days_in_month);
ZEND_FUNCTION(cal_from_jd);
ZEND_FUNCTION(cal_info);
ZEND_FUNCTION(cal_to_jd);
ZEND_FUNCTION(easter_date);
ZEND_FUNCTION(easter_days);
ZEND_FUNCTION(frenchtojd);
ZEND_FUNCTION(gregoriantojd);
ZEND_FUNCTION(jddayofweek);
ZEND_FUNCTION(jdmonthname);
ZEND_FUNCTION(jdtofrench);
ZEND_FUNCTION(jdtogregorian);
ZEND_FUNCTION(jdtojewish);
ZEND_FUNCTION(jdtojulian);
ZEND_FUNCTION(jdtounix);
ZEND_FUNCTION(jewishtojd);
ZEND_FUNCTION(juliantojd);
ZEND_FUNCTION(unixtojd);

static const zend_function_entry ext_functions[] = {
	ZEND_FE(cal_days_in_month, arginfo_cal_days_in_month)
	ZEND_FE(cal_from_jd, arginfo_cal_from_jd)
	ZEND_FE(cal_info, arginfo_cal_info)
	ZEND_FE(cal_to_jd, arginfo_cal_to_jd)
	ZEND_FE(easter_date, arginfo_easter_date)
	ZEND_FE(easter_days, arginfo_easter_days)
	ZEND_FE(frenchtojd, arginfo_frenchtojd)
	ZEND_FE(gregoriantojd, arginfo_gregoriantojd)
	ZEND_FE(jddayofweek, arginfo_jddayofweek)
	ZEND_FE(jdmonthname, arginfo_jdmonthname)
	ZEND_FE(jdtofrench, arginfo_jdtofrench)
	ZEND_FE(jdtogregorian, arginfo_jdtogregorian)
	ZEND_FE(jdtojewish, arginfo_jdtojewish)
	ZEND_FE(jdtojulian, arginfo_jdtojulian)
	ZEND_FE(jdtounix, arginfo_jdtounix)
	ZEND_FE(jewishtojd, arginfo_jewishtojd)
	ZEND_FE(juliantojd, arginfo_juliantojd)
	ZEND_FE(unixtojd, arginfo_unixtojd)
	ZEND_FE_END
};

static void register_calendar_symbols(int module_number)
{
	REGISTER_LONG_CONSTANT("CAL_GREGORIAN", CAL_GREGORIAN, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_JULIAN", CAL_JULIAN, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_JEWISH", CAL_JEWISH, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_FRENCH", CAL_FRENCH, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_NUM_CALS", CAL_NUM_CALS, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_DOW_DAYNO", CAL_DOW_DAYNO, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_DOW_SHORT", CAL_DOW_SHORT, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_DOW_LONG", CAL_DOW_LONG, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_GREGORIAN_SHORT", CAL_MONTH_GREGORIAN_SHORT, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_GREGORIAN_LONG", CAL_MONTH_GREGORIAN_LONG, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_JULIAN_SHORT", CAL_MONTH_JULIAN_SHORT, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_JULIAN_LONG", CAL_MONTH_JULIAN_LONG, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_JEWISH", CAL_MONTH_JEWISH, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_MONTH_FRENCH", CAL_MONTH_FRENCH, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_EASTER_DEFAULT", CAL_EASTER_DEFAULT, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_EASTER_ROMAN", CAL_EASTER_ROMAN, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_EASTER_ALWAYS_GREGORIAN", CAL_EASTER_ALWAYS_GREGORIAN, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_EASTER_ALWAYS_JULIAN", CAL_EASTER_ALWAYS_JULIAN, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_JEWISH_ADD_ALAFIM_GERESH", CAL_JEWISH_ADD_ALAFIM_GERESH, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_JEWISH_ADD_ALAFIM", CAL_JEWISH_ADD_ALAFIM, CONST_PERSISTENT);
	REGISTER_LONG_CONSTANT("CAL_JEWISH_ADD_GERESHAYIM", CAL_JEWISH_ADD_GERESHAYIM, CONST_PERSISTENT);
}

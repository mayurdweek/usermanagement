/*
 * Copyright (C) 2019 Alexander Borisov
 *
 * Author: Alexander Borisov <borisov@lexbor.com>
 */

/*
 * Caution!
 * This file generated by the script "utils/lexbor/encoding/multi-byte.py"!
 * Do not change this file!
 */


#ifndef LEXBOR_ENCODING_MULTI_H
#define LEXBOR_ENCODING_MULTI_H

#ifdef __cplusplus
extern "C" {
#endif

#include "lexbor/encoding/base.h"

#include "lexbor/core/shs.h"


#define LXB_ENCODING_MULTI_HASH_BIG5_SIZE 20172
#define LXB_ENCODING_MULTI_HASH_EUC_KR_SIZE 28041
#define LXB_ENCODING_MULTI_HASH_GB18030_SIZE 19950
#define LXB_ENCODING_MULTI_HASH_ISO_2022_JP_KATAKANA_SIZE 52
#define LXB_ENCODING_MULTI_HASH_JIS0208_SIZE 9253
#define LXB_ENCODING_MULTI_HASH_JIS0212_SIZE 6923


LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_big5[19782];
LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_euc_kr[23750];
LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_gb18030[23940];
LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_iso_2022_jp_katakana[63];
LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_jis0208[11104];
LXB_EXTERN const lxb_encoding_multi_index_t lxb_encoding_multi_index_jis0212[7211];

LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_big5[23033];
LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_euc_kr[30109];
LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_gb18030[23941];
LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_iso_2022_jp_katakana[72];
LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_jis0208[11349];
LXB_EXTERN const lexbor_shs_hash_t lxb_encoding_multi_hash_jis0212[8552];


#ifdef __cplusplus
} /* extern "C" */
#endif

#endif /* LEXBOR_ENCODING_MULTI_H */

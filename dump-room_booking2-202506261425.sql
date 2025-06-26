--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 17.2

-- Started on 2025-06-26 14:25:29

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE room_booking2;
--
-- TOC entry 5009 (class 1262 OID 16682)
-- Name: room_booking2; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE room_booking2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.UTF-8';


\connect room_booking2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 5010 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 17967)
-- Name: cache; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


--
-- TOC entry 222 (class 1259 OID 17974)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


--
-- TOC entry 227 (class 1259 OID 17999)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- TOC entry 226 (class 1259 OID 17998)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5011 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 243 (class 1259 OID 26331)
-- Name: fasilitas_ruangan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.fasilitas_ruangan (
    id bigint NOT NULL,
    fasilitas_id integer,
    ruangan_id integer,
    is_actibe boolean
);


--
-- TOC entry 242 (class 1259 OID 26330)
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.fasilitas_ruangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5012 (class 0 OID 0)
-- Dependencies: 242
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.fasilitas_ruangan_id_seq OWNED BY public.fasilitas_ruangan.id;


--
-- TOC entry 241 (class 1259 OID 18066)
-- Name: informasi; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.informasi (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    deskripsi character varying(255) NOT NULL,
    image character varying(255) NOT NULL
);


--
-- TOC entry 240 (class 1259 OID 18065)
-- Name: informasi_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.informasi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5013 (class 0 OID 0)
-- Dependencies: 240
-- Name: informasi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.informasi_id_seq OWNED BY public.informasi.id;


--
-- TOC entry 225 (class 1259 OID 17991)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


--
-- TOC entry 224 (class 1259 OID 17982)
-- Name: jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


--
-- TOC entry 223 (class 1259 OID 17981)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5014 (class 0 OID 0)
-- Dependencies: 223
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 229 (class 1259 OID 18011)
-- Name: master_profil_customer; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.master_profil_customer (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    nama character varying(255) NOT NULL,
    telepon character varying(255),
    alamat character varying(255),
    password character varying(255),
    password_baru character varying(255),
    password_lama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 228 (class 1259 OID 18010)
-- Name: master_profil_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.master_profil_customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5015 (class 0 OID 0)
-- Dependencies: 228
-- Name: master_profil_customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.master_profil_customer_id_seq OWNED BY public.master_profil_customer.id;


--
-- TOC entry 216 (class 1259 OID 17934)
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- TOC entry 215 (class 1259 OID 17933)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5016 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 233 (class 1259 OID 18031)
-- Name: mst_fasilitas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.mst_fasilitas (
    id bigint NOT NULL,
    nama_fasilitas character varying(255) NOT NULL,
    kuantitas character varying(255) NOT NULL,
    deskripsi character varying(255) NOT NULL,
    harga_satuan double precision NOT NULL,
    image character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    is_umum boolean
);


--
-- TOC entry 232 (class 1259 OID 18030)
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.mst_fasilitas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5017 (class 0 OID 0)
-- Dependencies: 232
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.mst_fasilitas_id_seq OWNED BY public.mst_fasilitas.id;


--
-- TOC entry 235 (class 1259 OID 18040)
-- Name: mst_harga_sewa; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.mst_harga_sewa (
    id bigint NOT NULL,
    ruangan_id character varying(255) NOT NULL,
    durasi integer NOT NULL,
    harga double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 234 (class 1259 OID 18039)
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.mst_harga_sewa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5018 (class 0 OID 0)
-- Dependencies: 234
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.mst_harga_sewa_id_seq OWNED BY public.mst_harga_sewa.id;


--
-- TOC entry 231 (class 1259 OID 18022)
-- Name: mst_ruangan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.mst_ruangan (
    id bigint NOT NULL,
    nama_ruangan character varying(255) NOT NULL,
    kapasitas character varying(255) NOT NULL,
    lokasi character varying(255) NOT NULL,
    panjang_ruangan integer NOT NULL,
    lebar_ruangan integer NOT NULL,
    deskripsi text NOT NULL,
    image character varying(255) NOT NULL,
    harga double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    tags character varying,
    active boolean,
    order_id integer
);


--
-- TOC entry 230 (class 1259 OID 18021)
-- Name: mst_ruangan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.mst_ruangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5019 (class 0 OID 0)
-- Dependencies: 230
-- Name: mst_ruangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.mst_ruangan_id_seq OWNED BY public.mst_ruangan.id;


--
-- TOC entry 245 (class 1259 OID 26386)
-- Name: orders; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.orders (
    id bigint NOT NULL,
    order_num character varying(255) NOT NULL,
    tgl_order character varying(255),
    ordered_by character varying(255),
    order_for integer
);


--
-- TOC entry 244 (class 1259 OID 26385)
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5020 (class 0 OID 0)
-- Dependencies: 244
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- TOC entry 219 (class 1259 OID 17951)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- TOC entry 220 (class 1259 OID 17958)
-- Name: sessions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


--
-- TOC entry 239 (class 1259 OID 18056)
-- Name: trx_sewa; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.trx_sewa (
    id bigint NOT NULL,
    mst_ruangan_id integer NOT NULL,
    mst_harga_sewa_id integer NOT NULL,
    mst_profil_id character varying(255),
    tanggal_awal timestamp(0) without time zone,
    tanggal_akhir timestamp(0) without time zone,
    keperluan character varying(255),
    diskon integer,
    deskripsi character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    order_id integer
);


--
-- TOC entry 237 (class 1259 OID 18047)
-- Name: trx_sewa_fasilitas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.trx_sewa_fasilitas (
    id bigint NOT NULL,
    trx_sewa_id integer NOT NULL,
    mst_fasilitas_id character varying(255),
    kuantitas integer,
    satuan double precision,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 236 (class 1259 OID 18046)
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.trx_sewa_fasilitas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5021 (class 0 OID 0)
-- Dependencies: 236
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.trx_sewa_fasilitas_id_seq OWNED BY public.trx_sewa_fasilitas.id;


--
-- TOC entry 238 (class 1259 OID 18055)
-- Name: trx_sewa_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.trx_sewa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5022 (class 0 OID 0)
-- Dependencies: 238
-- Name: trx_sewa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.trx_sewa_id_seq OWNED BY public.trx_sewa.id;


--
-- TOC entry 218 (class 1259 OID 17941)
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    name character varying(255),
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    status boolean NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role integer DEFAULT 2 NOT NULL
);


--
-- TOC entry 217 (class 1259 OID 17940)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 5023 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4772 (class 2604 OID 18002)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4781 (class 2604 OID 26334)
-- Name: fasilitas_ruangan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.fasilitas_ruangan ALTER COLUMN id SET DEFAULT nextval('public.fasilitas_ruangan_id_seq'::regclass);


--
-- TOC entry 4780 (class 2604 OID 18069)
-- Name: informasi id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.informasi ALTER COLUMN id SET DEFAULT nextval('public.informasi_id_seq'::regclass);


--
-- TOC entry 4771 (class 2604 OID 17985)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 4774 (class 2604 OID 18014)
-- Name: master_profil_customer id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.master_profil_customer ALTER COLUMN id SET DEFAULT nextval('public.master_profil_customer_id_seq'::regclass);


--
-- TOC entry 4768 (class 2604 OID 17937)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4776 (class 2604 OID 18034)
-- Name: mst_fasilitas id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_fasilitas ALTER COLUMN id SET DEFAULT nextval('public.mst_fasilitas_id_seq'::regclass);


--
-- TOC entry 4777 (class 2604 OID 18043)
-- Name: mst_harga_sewa id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_harga_sewa ALTER COLUMN id SET DEFAULT nextval('public.mst_harga_sewa_id_seq'::regclass);


--
-- TOC entry 4775 (class 2604 OID 18025)
-- Name: mst_ruangan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_ruangan ALTER COLUMN id SET DEFAULT nextval('public.mst_ruangan_id_seq'::regclass);


--
-- TOC entry 4782 (class 2604 OID 26389)
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- TOC entry 4779 (class 2604 OID 18059)
-- Name: trx_sewa id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.trx_sewa ALTER COLUMN id SET DEFAULT nextval('public.trx_sewa_id_seq'::regclass);


--
-- TOC entry 4778 (class 2604 OID 18050)
-- Name: trx_sewa_fasilitas id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.trx_sewa_fasilitas ALTER COLUMN id SET DEFAULT nextval('public.trx_sewa_fasilitas_id_seq'::regclass);


--
-- TOC entry 4769 (class 2604 OID 17944)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4979 (class 0 OID 17967)
-- Dependencies: 221
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4980 (class 0 OID 17974)
-- Dependencies: 222
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4985 (class 0 OID 17999)
-- Dependencies: 227
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 5001 (class 0 OID 26331)
-- Dependencies: 243
-- Data for Name: fasilitas_ruangan; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.fasilitas_ruangan VALUES (3, 10, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (4, 11, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (5, 12, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (6, 13, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (7, 14, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (9, 16, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (11, 4, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (12, 14, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (13, 5, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (1, 11, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (10, 20, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (14, 11, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (8, 20, 11, true);
INSERT INTO public.fasilitas_ruangan VALUES (15, 15, 10, true);
INSERT INTO public.fasilitas_ruangan VALUES (16, 21, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (17, 20, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (18, 4, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (19, 5, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (20, 15, 13, true);
INSERT INTO public.fasilitas_ruangan VALUES (23, 20, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (25, 15, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (26, 5, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (21, 22, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (22, 4, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (24, 10, 12, true);
INSERT INTO public.fasilitas_ruangan VALUES (27, 21, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (29, 5, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (30, 4, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (31, 20, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (32, 14, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (28, 11, 15, true);
INSERT INTO public.fasilitas_ruangan VALUES (33, 11, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (34, 5, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (35, 21, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (36, 15, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (37, 10, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (38, 20, 14, true);
INSERT INTO public.fasilitas_ruangan VALUES (39, 4, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (40, 20, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (41, 14, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (42, 15, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (2, 21, 16, true);
INSERT INTO public.fasilitas_ruangan VALUES (43, 4, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (44, 20, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (45, 14, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (46, 15, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (47, 11, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (48, 10, 17, true);
INSERT INTO public.fasilitas_ruangan VALUES (49, 4, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (50, 20, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (51, 14, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (52, 15, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (53, 11, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (54, 10, 18, true);
INSERT INTO public.fasilitas_ruangan VALUES (55, 5, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (56, 21, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (57, 15, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (58, 11, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (59, 10, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (60, 22, 20, true);
INSERT INTO public.fasilitas_ruangan VALUES (61, 5, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (62, 21, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (63, 15, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (64, 11, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (65, 23, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (66, 24, 21, true);
INSERT INTO public.fasilitas_ruangan VALUES (67, 5, 22, true);
INSERT INTO public.fasilitas_ruangan VALUES (68, 21, 22, true);
INSERT INTO public.fasilitas_ruangan VALUES (69, 11, 22, true);
INSERT INTO public.fasilitas_ruangan VALUES (70, 15, 22, true);
INSERT INTO public.fasilitas_ruangan VALUES (71, 24, 22, true);
INSERT INTO public.fasilitas_ruangan VALUES (72, 10, 22, true);


--
-- TOC entry 4999 (class 0 OID 18066)
-- Dependencies: 241
-- Data for Name: informasi; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.informasi VALUES (6, 'Pasar Bahagia Vol. 02 Kembali ke Akar', 'Pasar Bahagia Vol. 02 Kembali ke Akar', 'Pasar Bahagia (1).jpg');
INSERT INTO public.informasi VALUES (7, 'Pasar Bahagia Memanggil Kreator Bahagia', 'Pasar Bahagia Vol. 02 Kembali ke Akar Memanggil Kreator Bahagia', 'Pasar Bahagia (2).jpg');
INSERT INTO public.informasi VALUES (8, 'Workshop Membuat Es Cincau dari Pekarangan Dapur', 'Workshop Membuat Es Cincau dari Pekarangan Dapur Bersama Wilma Chrysanti', 'Pasar Bahagia (3).jpg');
INSERT INTO public.informasi VALUES (9, 'Workshop Reparasi Baju Juga Lucu', 'Workshop Reparasi Baju Juga Lucu Bersama Velie Kurniawan', 'Pasar Bahagia (4).jpg');
INSERT INTO public.informasi VALUES (10, 'Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas', 'Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas Bersama Nia Nurdiansyah', 'Pasar Bahagia (5).jpg');


--
-- TOC entry 4983 (class 0 OID 17991)
-- Dependencies: 225
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4982 (class 0 OID 17982)
-- Dependencies: 224
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4987 (class 0 OID 18011)
-- Dependencies: 229
-- Data for Name: master_profil_customer; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.master_profil_customer VALUES (7, 'ranibilla@gmail.com', 'Billa Rani', '081234567770', 'Jalan Karangasem no 11 rt 2/3', '123', '123', NULL, '2024-12-27 04:09:38', '2024-12-27 15:24:27');
INSERT INTO public.master_profil_customer VALUES (1, 'syaharanibilla1@gmail.com', 'Billa', '081234567770', 'Bintaro, Jakarta Selatan', '123456', '123456', NULL, NULL, '2024-12-29 20:24:01');


--
-- TOC entry 4974 (class 0 OID 17934)
-- Dependencies: 216
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO public.migrations VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2024_04_24_081427_create_master_profil_customer_table', 1);
INSERT INTO public.migrations VALUES (5, '2024_12_23_071103_1_create_mst_ruangan', 1);
INSERT INTO public.migrations VALUES (6, '2024_12_23_072156_2_create_mst_fasilitas', 1);
INSERT INTO public.migrations VALUES (7, '2024_12_23_072629_3_create_mst_harga_sewa', 1);
INSERT INTO public.migrations VALUES (8, '2024_12_23_073123_4_create_trx_sewa_fasilitas', 1);
INSERT INTO public.migrations VALUES (9, '2024_12_23_073459_5_create_trx_sewa_', 1);
INSERT INTO public.migrations VALUES (10, '2024_12_26_081910_informasi', 2);
INSERT INTO public.migrations VALUES (11, '2024_12_26_082408_create_infomasi', 3);
INSERT INTO public.migrations VALUES (12, '2024_12_26_082621_tabel_informasi', 4);


--
-- TOC entry 4991 (class 0 OID 18031)
-- Dependencies: 233
-- Data for Name: mst_fasilitas; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.mst_fasilitas VALUES (37, 'Sanganan 1', '15', 'Kue Sus, Donat Gula, Lemper, Minuman Panas', 450000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (38, 'Sanganan 2', '30', '100 Jajan Pasar Mini (8 Macam), 1 Macam Keripik, Minuman Panas, Minuman Dingin', 800000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (34, 'Gayatri - Sundari', '1', 'Nasi Putih, Sop, Sayuran, Olahan Ayam/Ikan, Telur Balado, Kerupuk Udang, Buah Potong (3 Macam), Teh Sereh Pandan', 65000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (8, 'Parkir Luas', '1', '', 0, 'fa-solid fa-car', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (35, 'Gayatri - Bhavya', '1', 'Nasi Putih, Nasi Goreng Paon, Sop, Sayuran, Olahan Ayam/Ikan, Olahan Daging, Kerupuk Udang, Buah Potong (3 Macam), Tek Sereh Pandan', 75000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (11, 'Wifi', '1', 'Wifi', 0, 'fa-solid fa-wifi', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (12, 'Full Band Equipment', '1', 'Full Band Equipment', 0, 'fa-solid fa-music', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (13, 'Mics 1000W 32 Channels', '1', 'Mics 1000W 32 Channels', 0, 'fa-solid fa-microphone', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (14, 'Mixer', '1', 'Mixer', 0, 'fa-solid fa-sliders', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (10, 'Ruangan Terhubung', '1', 'ruangan terhubung', 0, 'fa-solid fa-door-open', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (36, 'Gayatri - Devi', '1', 'Nasi Putih, Olahan Nasi/Mie, Sop, Sayuran, Olahan Ayam/Ikan, Olahan Daging, Kerupuk Udang, Buah Potong (3 Macam), Teh Sereh Pandan', 85000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (5, 'Kursi & Meja', '1', 'Kursi & Meja', 0, 'fa-solid fa-chair', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (4, 'Microphone', '1', 'microphone', 0, 'fa-solid fa-microphone', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (39, 'Sanganan 3', '50', '200 Jajan Pasar Mini (12 Macam), 2 Macam Keripik, Minuman Panas, Minuman Dingin', 1300000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (15, 'Kangen Water', '1', 'Kangen Water', 0, 'fa-solid fa-mug-saucer', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (22, 'Pemanas Teh', '1', 'Pemanas Teh', 0, 'fa-solid fa-mug-hot', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (20, 'Speaker', '1', 'Speaker', 0, 'fa-solid fa-volume-high', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (16, 'Teknisi Audio', '1', 'Teknisi Audio', 0, 'fa-solid fa-person', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (21, 'AC', '1', 'AC', 0, 'fa-solid fa-fan', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (24, 'Proyektor', '1', 'Proyektor', 0, 'fa-solid fa-video', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (23, 'Papan Tulis', '1', 'Papan Tulis', 0, 'fa-solid fa-chalkboard', NULL, NULL, true);
INSERT INTO public.mst_fasilitas VALUES (1, 'Sarapan Pagi 1', '1', 'Bajigur, Pisang Rebus, Singkong Goreng', 25000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (3, 'Sarapan Pagi 3', '1', 'Risoles, Roti Bakar Manis, Teh Panas/Kopi Hitam', 25000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (2, 'Sarapan Pagi 2', '1', 'Sekoteng/Susu Jahe, Pisang Goreng', 25000, 'Pasar Bahagia (1).jpg', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (26, 'Mentari 1', '1', 'Lontong Sayur, Es/Panas Teh Lemon ', 30000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (28, 'Mentari 2', '1', 'Bubur Ayam/Kornet Sapi, Teh Panas/Kopi Susu', 30000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (29, 'Mentari 3', '1', 'Omelet Keju, Teh Tarik/Kopi Susu', 30000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (31, 'Amboja Soto Betawi', '1', 'Soto Betawi, Semangka, Teh Sereh Pandan', 45000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (32, 'Amboja Soto Mie Bogor', '1', 'Soto Mie Bogor, Melon, Teh Sereh Pandan', 45000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (30, 'Amboja Soto Ayam', '1', 'Soto Ayam, Semangka & Melon, Teh Sereh Pandan', 45000, 'Sarapan.png', NULL, NULL, false);
INSERT INTO public.mst_fasilitas VALUES (33, 'Gayatri - Prasaja', '1', 'Nasi Putih, Sop, Sayuran, Olahan Ayam/Ikan, Kerupuk Udang, Semangka, Puding, Teh Sereh Pandan', 55000, 'Sarapan.png', NULL, NULL, false);


--
-- TOC entry 4993 (class 0 OID 18040)
-- Dependencies: 235
-- Data for Name: mst_harga_sewa; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.mst_harga_sewa VALUES (1, '15', 1, 300000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (2, '16', 1, 700000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (3, '17', 1, 900000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (4, '14', 1, 200000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (5, '13', 1, 400000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (6, '11', 1, 700000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (7, '10', 1, 500000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (8, '12', 1, 300000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (9, '18', 1, 150000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (10, '20', 1, 100000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (11, '21', 1, 200000, NULL, NULL);
INSERT INTO public.mst_harga_sewa VALUES (12, '22', 1, 150000, NULL, NULL);


--
-- TOC entry 4989 (class 0 OID 18022)
-- Dependencies: 231
-- Data for Name: mst_ruangan; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.mst_ruangan VALUES (15, 'Karya', '25', 'Lantai 2', 10, 15, 'Karya bermakna hasil atau buah dari pekerjaan. Ruang Karya merupakan tempat 
                untuk menghasilkan dan menampilkan buah pekerjaan. Karya dirancang untuk 
                kegiatan lokakarya, dialog, talkshow, pameran karya, hingga pemutaran film.', 'Karya.jpg', 300000, NULL, NULL, NULL, true, 2);
INSERT INTO public.mst_ruangan VALUES (16, 'Arupadatu', '50', 'Lantai 3', 10, 15, 'Arupadhatu bermakna alam tertinggi, alam atas, atau nirwana, tempat dimana 
                manusia terbebas dari keterikatan manusiawinya. Ruang Arupadhatu 
                diharapkan menjadi tempat bagi setiap orang untuk berproses menjadi manusia 
                yang lebih baik. Arupadhatu dirancang untuk berbagai kegiatan, seperti seminar, 
                pameran, lokakarya, pemutaran film, office and community gathering, hingga 
                acara-acara keluarga seperti ulang tahun dan reuni.', 'Arupadatu.jpg', 700000, NULL, NULL, NULL, true, 2);
INSERT INTO public.mst_ruangan VALUES (17, 'Nirmana', '80', 'Lantai 3', 10, 15, 'Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana 
                menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. 
                Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal 
                maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.', 'Nirmana.jpg', 900000, NULL, NULL, NULL, true, 3);
INSERT INTO public.mst_ruangan VALUES (14, 'Pranata', '8', 'Lantai 2', 10, 15, 'Panata bermakna penata atau aturan. Orang-orang yang bekerja di ruang ini 
                diharapkan mampu menjadi penata bagi dirinya dan sesama. Ruang Panata 
                dirancang menjadi kantor atau tempat bekerja bagi organisasi ataupun komunitas.', 'Panata.jpg', 200000, NULL, NULL, 'meeting,Birthday Party', true, 3);
INSERT INTO public.mst_ruangan VALUES (13, 'Bramara', '30', 'Lantai 1', 10, 15, 'Bramara bermakna lebah. Lebah memiliki karakteristik pekerja keras, tulus, 
                mandiri, dan bermanfaat bagi sesama. Bramara dirancang untuk kegiatan 
                seminar, webinar, lokakarya, workshop, dan pameran. Namun Bramara juga
                dapat digunakan untuk acara keluarga, seperti ulang tahun dan reuni.', 'Bramara.jpg', 400000, NULL, NULL, NULL, true, 1);
INSERT INTO public.mst_ruangan VALUES (11, 'Sangita', '15', 'Lantai 1', 10, 15, 'Sangita bermakna musik. Sangita adalah studio musik tempat para pemusik 
                mengekspresikan diri. Sangita dapat digunakan untuk latihan musik, rekaman, 
                dan podcast. Ketika dipadukan bersama Ruang Plataran, Sangita 
                bertransformasi menjadi panggung pertunjukan musik untuk berbagai acara kumpul keluarga dan bisnis.', 'Sangita.jpg', 700000, NULL, NULL, 'meeting', true, 1);
INSERT INTO public.mst_ruangan VALUES (10, 'Plataran', '100', 'Lantai 1', 10, 15, 'Plataran artinya serambi atau halaman rumah. 
                Plataran merupakan ruang terbuka (outdoor) yang hijau dan sejuk, 
                berlokasi di halaman Rumah Anindhaloka. Plataran sangat sesuai untuk 
                kegiatan kumpul keluarga, komunitas, maupun bisnis, seperti ulang tahun, 
                peluncuran produk, pertunjukan musik, dan office gathering.', 'Plataran.jpg', 500000, NULL, NULL, 'meeting,birtday party;', true, 1);
INSERT INTO public.mst_ruangan VALUES (12, 'Nirnaya', '20', 'Lantai 1', 10, 15, 'Nirnaya bermakna pengetahuan. Nirnaya merupakan ruang terbuka (outdoor) 
                sejuk dan tenang, diharapkan menjadi tempat lahirnya ide-ide cemerlang dan 
                kreatif. Nirnaya dirancang sebagai tempat bertukar fikiran dan berdiskusi yang 
                nyaman dalam bentuk talk show, dialog, atau rapat kecil yang rileks. Dipadu 
                dengan Bramara, Nirnaya menjadi ruang makan yang akrab.', 'Nirnaya.jpg', 300000, NULL, NULL, NULL, true, 2);
INSERT INTO public.mst_ruangan VALUES (18, 'Nirwana', '15', 'Lantai 3', 10, 15, 'Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana 
                menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. 
                Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal 
                maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.', 'Nirwana.jpg', 150000, NULL, NULL, NULL, true, 3);
INSERT INTO public.mst_ruangan VALUES (20, 'Agawe', '16', 'Lantai 2', 10, 15, 'Agawe bermakna membawa atau mendatangkan. Ruang Agawe diharapkan
membawa kesejahteraan bagi mereka yang bekerja disana dan sesamanya.
Agawe merupakan coworking space, terdiri dari 4 islands yang bisa menjadi
tempat bekerja bersama.', 'Agawe.png', 100000, NULL, NULL, NULL, true, 3);
INSERT INTO public.mst_ruangan VALUES (21, 'Kumpul', '10', 'Lantai 2', 10, 15, 'Kumpul berarti berkumpul bersama. Ruang kumpul merupakan ruang untuk
berdiskusi, berdialog untuk menghasilkan ide dan keputusan cemerlang. Ruang
kumpul dirancang untuk memenuhi kebutuhan rapat, baik bagi bisnis maupun
komunitas.', 'Kumpul.png', 200000, NULL, NULL, NULL, true, 4);
INSERT INTO public.mst_ruangan VALUES (22, 'Karsa', '6', 'Lantai 2', 10, 15, 'Karsa bermakna niat dan kemauan kuat. Ruang Karsa diharapkan mampu
memperteguh niat baik dan kemauan untuk mencapainya. Ruang Karsa
dirancang menjadi ruang kantor dan kerja bagi komunitas dan organisasi.', 'Karsa.png', 150000, NULL, NULL, NULL, true, 5);


--
-- TOC entry 5003 (class 0 OID 26386)
-- Dependencies: 245
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.orders VALUES (2, 'dwqd', NULL, 'Pengguna 1', NULL);
INSERT INTO public.orders VALUES (3, 'wdqddq', NULL, 'Pengguna 3', NULL);
INSERT INTO public.orders VALUES (4, 'gdsdgs', NULL, 'Pengguna 2', NULL);
INSERT INTO public.orders VALUES (5, 'fdgdfg', NULL, 'Pengguna 4', NULL);


--
-- TOC entry 4977 (class 0 OID 17951)
-- Dependencies: 219
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4978 (class 0 OID 17958)
-- Dependencies: 220
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.sessions VALUES ('4w37vF0vOfp4Dmuq1GSw2JdJEYpqFUFBknhY4OJx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjFXb3ZzY1VNSTFzNXBkc3ppUGZKQVBFSTdBMDd0OFFtVnJTQXNwNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750851388);
INSERT INTO public.sessions VALUES ('sq1IMn9h1H4WBl3WHYPOha9hHlUzFZjL0ErKEn0V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic3lUdHp2alBGcVBUblFNMDlMSmxqdlVRVXRma0hDTG1MYzlHaUl4SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1750851671);
INSERT INTO public.sessions VALUES ('twJ3t7Tzq4RM81CcGOnJ2Ms9sQM6sD7IRSjsqTBC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiR1Q5ZjlwOEhPeUpzUWZuTmZCeW1GSXU0ek5Gb1lzMGFCUzB3TFBvZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ydWFuZ2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJwZXNhbjIiO2E6NDp7czo3OiJydWFuZ2FuIjthOjE6e2k6MDthOjM6e3M6MjoiaWQiO3M6MjoiMTAiO3M6NDoibmFtYSI7czo4OiJQbGF0YXJhbiI7czo1OiJoYXJnYSI7aTo1MDAwMDA7fX1zOjEyOiJpdGVtVGFtYmFoYW4iO2E6MTp7aTowO2E6NDp7czoyOiJpZCI7czoxOiIzIjtzOjQ6Im5hbWEiO3M6MTQ6IlNhcmFwYW4gUGFnaSAzIjtzOjY6Imp1bWxhaCI7aToxO3M6ODoic3VidG90YWwiO2k6MjUwMDA7fX1zOjEwOiJ0b3RhbEhhcmdhIjtpOjUyNTAwMDtzOjc6InBlc2FuYW4iO2E6Mzp7czoyOiJpZCI7czoyOiIxMCI7czo0OiJuYW1hIjtzOjg6IlBsYXRhcmFuIjtzOjU6ImhhcmdhIjtpOjUwMDAwMDt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo2OiJwZXNhbjMiO2E6NTp7czo4OiJydWFuZ2FucyI7YToxOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjEwIjtzOjQ6Im5hbWEiO3M6ODoiUGxhdGFyYW4iO3M6NToiaGFyZ2EiO2k6NTAwMDAwO3M6ODoic3VidG90YWwiO2k6MTUwMDAwMDt9fXM6OToidGFtYmFoYW5zIjthOjE6e2k6MDthOjQ6e3M6MjoiaWQiO3M6MToiMyI7czo0OiJuYW1hIjtzOjE0OiJTYXJhcGFuIFBhZ2kgMyI7czo2OiJqdW1sYWgiO2k6MTtzOjg6InN1YnRvdGFsIjtpOjI1MDAwO319czo5OiJ0Z2xfbXVsYWkiO3M6MTc6IjIwMjUtMDYtMjUgMDk6MDAgIjtzOjExOiJ0Z2xfc2VsZXNhaSI7czoxNzoiMjAyNS0wNi0yNSAxMjowMCAiO3M6MTA6InRvdGFsSGFyZ2EiO2k6MTUyNTAwMDt9czo2OiJwZXNhbjQiO2E6Njp7czo4OiJydWFuZ2FucyI7YToxOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjEwIjtzOjQ6Im5hbWEiO3M6ODoiUGxhdGFyYW4iO3M6NToiaGFyZ2EiO2k6NTAwMDAwO3M6ODoic3VidG90YWwiO2k6MTUwMDAwMDt9fXM6OToidGFtYmFoYW5zIjthOjE6e2k6MDthOjQ6e3M6MjoiaWQiO3M6MToiMyI7czo0OiJuYW1hIjtzOjE0OiJTYXJhcGFuIFBhZ2kgMyI7czo2OiJqdW1sYWgiO2k6MTtzOjg6InN1YnRvdGFsIjtpOjI1MDAwO319czo5OiJ0Z2xfbXVsYWkiO3M6MTY6IjIwMjUtMDYtMjUgMDk6MDAiO3M6MTE6InRnbF9zZWxlc2FpIjtzOjE2OiIyMDI1LTA2LTI1IDEyOjAwIjtzOjEwOiJ0b3RhbEhhcmdhIjtpOjE1MjUwMDA7czo1OiJub3RlcyI7czo3OiJjYXRhdGFuIjt9fQ==', 1750796756);


--
-- TOC entry 4997 (class 0 OID 18056)
-- Dependencies: 239
-- Data for Name: trx_sewa; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.trx_sewa VALUES (55, 18, 2640000, '1', '2025-06-23 08:00:00', '2025-06-23 11:00:00', 'dgsdgsgs', 0, 'midtrans', '2025-06-22 17:22:30', '2025-06-22 17:22:30', 7);
INSERT INTO public.trx_sewa VALUES (56, 14, 480000, '1', '2025-06-23 08:00:00', '2025-06-23 10:00:00', 'tesssss', 0, 'midtrans', '2025-06-22 17:25:07', '2025-06-22 17:25:07', 2);
INSERT INTO public.trx_sewa VALUES (57, 14, 800000, '1', '2025-06-24 08:00:00', '2025-06-24 12:00:00', 'cek cek', 0, 'midtrans', '2025-06-22 17:49:15', '2025-06-22 17:49:15', 3);
INSERT INTO public.trx_sewa VALUES (58, 18, 435000, '1', '2025-06-23 16:00:00', '2025-06-23 18:00:00', 'okkk', 0, 'midtrans', '2025-06-22 17:59:40', '2025-06-22 17:59:40', 4);
INSERT INTO public.trx_sewa VALUES (53, 10, 500000, '1', '2025-06-23 08:00:00', '2025-06-23 10:00:00', 'cek lagi', 0, 'midtrans', '2025-06-22 15:36:08', '2025-06-22 15:36:08', 15);


--
-- TOC entry 4995 (class 0 OID 18047)
-- Dependencies: 237
-- Data for Name: trx_sewa_fasilitas; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.trx_sewa_fasilitas VALUES (19, 21, '2', 1, NULL, '2025-01-10 07:38:40', '2025-01-10 07:38:40');
INSERT INTO public.trx_sewa_fasilitas VALUES (20, 21, '3', 1, NULL, '2025-01-10 07:38:40', '2025-01-10 07:38:40');
INSERT INTO public.trx_sewa_fasilitas VALUES (18, 21, '1', 2, NULL, '2025-01-10 07:38:40', '2025-01-10 07:38:40');
INSERT INTO public.trx_sewa_fasilitas VALUES (21, 30, '1', 2, 0, '2025-02-15 18:04:04', '2025-02-15 18:04:04');
INSERT INTO public.trx_sewa_fasilitas VALUES (22, 30, '2', 2, 0, '2025-02-15 18:04:04', '2025-02-15 18:04:04');
INSERT INTO public.trx_sewa_fasilitas VALUES (23, 32, '1', 1, 0, '2025-02-15 19:56:02', '2025-02-15 19:56:02');
INSERT INTO public.trx_sewa_fasilitas VALUES (24, 32, '2', 2, 0, '2025-02-15 19:56:02', '2025-02-15 19:56:02');
INSERT INTO public.trx_sewa_fasilitas VALUES (25, 34, '1', 1, 0, '2025-02-16 19:57:04', '2025-02-16 19:57:04');
INSERT INTO public.trx_sewa_fasilitas VALUES (26, 34, '2', 2, 0, '2025-02-16 19:57:04', '2025-02-16 19:57:04');
INSERT INTO public.trx_sewa_fasilitas VALUES (27, 36, '1', 1, 0, '2025-03-14 08:14:22', '2025-03-14 08:14:22');
INSERT INTO public.trx_sewa_fasilitas VALUES (28, 38, '1', 1, 0, '2025-05-20 10:07:53', '2025-05-20 10:07:53');
INSERT INTO public.trx_sewa_fasilitas VALUES (29, 38, '2', 1, 0, '2025-05-20 10:07:53', '2025-05-20 10:07:53');
INSERT INTO public.trx_sewa_fasilitas VALUES (30, 42, '33', 1, 0, '2025-06-11 14:53:50', '2025-06-11 14:53:50');
INSERT INTO public.trx_sewa_fasilitas VALUES (31, 42, '34', 2, 0, '2025-06-11 14:53:50', '2025-06-11 14:53:50');
INSERT INTO public.trx_sewa_fasilitas VALUES (32, 43, '26', 1, 0, '2025-06-12 13:09:57', '2025-06-12 13:09:57');
INSERT INTO public.trx_sewa_fasilitas VALUES (33, 43, '28', 2, 0, '2025-06-12 13:09:57', '2025-06-12 13:09:57');
INSERT INTO public.trx_sewa_fasilitas VALUES (34, 49, '1', 2, 0, '2025-06-16 07:59:31', '2025-06-16 07:59:31');
INSERT INTO public.trx_sewa_fasilitas VALUES (35, 49, '2', 1, 0, '2025-06-16 07:59:31', '2025-06-16 07:59:31');
INSERT INTO public.trx_sewa_fasilitas VALUES (36, 55, '26', 1, 0, '2025-06-22 17:22:30', '2025-06-22 17:22:30');
INSERT INTO public.trx_sewa_fasilitas VALUES (37, 55, '29', 2, 0, '2025-06-22 17:22:30', '2025-06-22 17:22:30');
INSERT INTO public.trx_sewa_fasilitas VALUES (38, 56, '26', 1, 0, '2025-06-22 17:25:07', '2025-06-22 17:25:07');
INSERT INTO public.trx_sewa_fasilitas VALUES (39, 56, '3', 2, 0, '2025-06-22 17:25:07', '2025-06-22 17:25:07');
INSERT INTO public.trx_sewa_fasilitas VALUES (40, 58, '32', 1, 0, '2025-06-22 17:59:40', '2025-06-22 17:59:40');
INSERT INTO public.trx_sewa_fasilitas VALUES (41, 58, '31', 2, 0, '2025-06-22 17:59:40', '2025-06-22 17:59:40');


--
-- TOC entry 4976 (class 0 OID 17941)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (15, 'ranibilla@gmail.com', NULL, NULL, '$2y$12$R6kcFTmFlHdH67yeVWZlqO9Z3CN6PmBuAaqzfUBNB4lRGPzIlgIuW', true, NULL, NULL, '2024-12-27 15:24:46', 2);
INSERT INTO public.users VALUES (1, 'syaharanibilla1@gmail.com', NULL, '2024-12-26 07:31:38', '$2y$12$u8C9hqPgnT0QOXWl04nG2ernN.J15/aEh54fC2SfKKkyLcKXLgzru', true, 'z4ljJSTHyPxFcZgrRY4SR23BC9mf5aMIA9cqKhiTbHXigNeYjosEl6TF0wTA', '2024-12-26 07:31:38', '2025-06-21 09:31:27', 2);


--
-- TOC entry 5024 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5025 (class 0 OID 0)
-- Dependencies: 242
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.fasilitas_ruangan_id_seq', 72, true);


--
-- TOC entry 5026 (class 0 OID 0)
-- Dependencies: 240
-- Name: informasi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.informasi_id_seq', 10, true);


--
-- TOC entry 5027 (class 0 OID 0)
-- Dependencies: 223
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 5028 (class 0 OID 0)
-- Dependencies: 228
-- Name: master_profil_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.master_profil_customer_id_seq', 7, true);


--
-- TOC entry 5029 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);


--
-- TOC entry 5030 (class 0 OID 0)
-- Dependencies: 232
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.mst_fasilitas_id_seq', 39, true);


--
-- TOC entry 5031 (class 0 OID 0)
-- Dependencies: 234
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.mst_harga_sewa_id_seq', 12, true);


--
-- TOC entry 5032 (class 0 OID 0)
-- Dependencies: 230
-- Name: mst_ruangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.mst_ruangan_id_seq', 24, true);


--
-- TOC entry 5033 (class 0 OID 0)
-- Dependencies: 244
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.orders_id_seq', 5, true);


--
-- TOC entry 5034 (class 0 OID 0)
-- Dependencies: 236
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.trx_sewa_fasilitas_id_seq', 41, true);


--
-- TOC entry 5035 (class 0 OID 0)
-- Dependencies: 238
-- Name: trx_sewa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.trx_sewa_id_seq', 58, true);


--
-- TOC entry 5036 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 15, true);


--
-- TOC entry 4798 (class 2606 OID 17980)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 4796 (class 2606 OID 17973)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 4805 (class 2606 OID 18007)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4807 (class 2606 OID 18009)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4825 (class 2606 OID 26336)
-- Name: fasilitas_ruangan fasilitas_ruangan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT fasilitas_ruangan_pkey PRIMARY KEY (id);


--
-- TOC entry 4823 (class 2606 OID 18073)
-- Name: informasi informasi_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.informasi
    ADD CONSTRAINT informasi_pkey PRIMARY KEY (id);


--
-- TOC entry 4803 (class 2606 OID 17997)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 4800 (class 2606 OID 17989)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4809 (class 2606 OID 18020)
-- Name: master_profil_customer master_profil_customer_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.master_profil_customer
    ADD CONSTRAINT master_profil_customer_email_unique UNIQUE (email);


--
-- TOC entry 4811 (class 2606 OID 18018)
-- Name: master_profil_customer master_profil_customer_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.master_profil_customer
    ADD CONSTRAINT master_profil_customer_pkey PRIMARY KEY (id);


--
-- TOC entry 4784 (class 2606 OID 17939)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4815 (class 2606 OID 18038)
-- Name: mst_fasilitas mst_fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_fasilitas
    ADD CONSTRAINT mst_fasilitas_pkey PRIMARY KEY (id);


--
-- TOC entry 4817 (class 2606 OID 18045)
-- Name: mst_harga_sewa mst_harga_sewa_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_harga_sewa
    ADD CONSTRAINT mst_harga_sewa_pkey PRIMARY KEY (id);


--
-- TOC entry 4813 (class 2606 OID 18029)
-- Name: mst_ruangan mst_ruangan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.mst_ruangan
    ADD CONSTRAINT mst_ruangan_pkey PRIMARY KEY (id);


--
-- TOC entry 4827 (class 2606 OID 26393)
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- TOC entry 4790 (class 2606 OID 17957)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4793 (class 2606 OID 17964)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4819 (class 2606 OID 18054)
-- Name: trx_sewa_fasilitas trx_sewa_fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.trx_sewa_fasilitas
    ADD CONSTRAINT trx_sewa_fasilitas_pkey PRIMARY KEY (id);


--
-- TOC entry 4821 (class 2606 OID 18063)
-- Name: trx_sewa trx_sewa_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.trx_sewa
    ADD CONSTRAINT trx_sewa_pkey PRIMARY KEY (id);


--
-- TOC entry 4786 (class 2606 OID 17950)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4788 (class 2606 OID 17948)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4801 (class 1259 OID 17990)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 4791 (class 1259 OID 17966)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4794 (class 1259 OID 17965)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4828 (class 2606 OID 26342)
-- Name: fasilitas_ruangan fasilitas_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT fasilitas_fk FOREIGN KEY (fasilitas_id) REFERENCES public.mst_fasilitas(id);


--
-- TOC entry 4829 (class 2606 OID 26337)
-- Name: fasilitas_ruangan ruangan_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT ruangan_fk FOREIGN KEY (ruangan_id) REFERENCES public.mst_ruangan(id);


-- Completed on 2025-06-26 14:25:30

--
-- PostgreSQL database dump complete
--


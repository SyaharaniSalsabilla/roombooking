--
-- PostgreSQL database dump
--

-- Dumped from database version 17.0
-- Dumped by pg_dump version 17.0

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: fasilitas_ruangan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fasilitas_ruangan (
    id bigint NOT NULL,
    fasilitas_id integer,
    ruangan_id integer,
    is_actibe boolean
);


ALTER TABLE public.fasilitas_ruangan OWNER TO postgres;

--
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fasilitas_ruangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.fasilitas_ruangan_id_seq OWNER TO postgres;

--
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fasilitas_ruangan_id_seq OWNED BY public.fasilitas_ruangan.id;


--
-- Name: informasi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.informasi (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    deskripsi character varying(255) NOT NULL,
    image character varying(255) NOT NULL
);


ALTER TABLE public.informasi OWNER TO postgres;

--
-- Name: informasi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.informasi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.informasi_id_seq OWNER TO postgres;

--
-- Name: informasi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.informasi_id_seq OWNED BY public.informasi.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: master_profil_customer; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.master_profil_customer OWNER TO postgres;

--
-- Name: master_profil_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_profil_customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.master_profil_customer_id_seq OWNER TO postgres;

--
-- Name: master_profil_customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_profil_customer_id_seq OWNED BY public.master_profil_customer.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: mst_fasilitas; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.mst_fasilitas OWNER TO postgres;

--
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mst_fasilitas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.mst_fasilitas_id_seq OWNER TO postgres;

--
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mst_fasilitas_id_seq OWNED BY public.mst_fasilitas.id;


--
-- Name: mst_harga_sewa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mst_harga_sewa (
    id bigint NOT NULL,
    ruangan_id character varying(255) NOT NULL,
    durasi integer NOT NULL,
    harga double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.mst_harga_sewa OWNER TO postgres;

--
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mst_harga_sewa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.mst_harga_sewa_id_seq OWNER TO postgres;

--
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mst_harga_sewa_id_seq OWNED BY public.mst_harga_sewa.id;


--
-- Name: mst_ruangan; Type: TABLE; Schema: public; Owner: postgres
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
    order_id integer,
    diskon integer DEFAULT 0
);


ALTER TABLE public.mst_ruangan OWNER TO postgres;

--
-- Name: mst_ruangan_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mst_ruangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.mst_ruangan_id_seq OWNER TO postgres;

--
-- Name: mst_ruangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mst_ruangan_id_seq OWNED BY public.mst_ruangan.id;


--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id bigint NOT NULL,
    order_num character varying(255) NOT NULL,
    tgl_order character varying(255),
    ordered_by character varying(255),
    order_for integer
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_seq OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: trx_sewa; Type: TABLE; Schema: public; Owner: postgres
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
    order_id integer,
    kode_transaksi character(255),
    status integer
);


ALTER TABLE public.trx_sewa OWNER TO postgres;

--
-- Name: trx_sewa_fasilitas; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.trx_sewa_fasilitas OWNER TO postgres;

--
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.trx_sewa_fasilitas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.trx_sewa_fasilitas_id_seq OWNER TO postgres;

--
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.trx_sewa_fasilitas_id_seq OWNED BY public.trx_sewa_fasilitas.id;


--
-- Name: trx_sewa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.trx_sewa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.trx_sewa_id_seq OWNER TO postgres;

--
-- Name: trx_sewa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.trx_sewa_id_seq OWNED BY public.trx_sewa.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: fasilitas_ruangan id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas_ruangan ALTER COLUMN id SET DEFAULT nextval('public.fasilitas_ruangan_id_seq'::regclass);


--
-- Name: informasi id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.informasi ALTER COLUMN id SET DEFAULT nextval('public.informasi_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: master_profil_customer id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_profil_customer ALTER COLUMN id SET DEFAULT nextval('public.master_profil_customer_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: mst_fasilitas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_fasilitas ALTER COLUMN id SET DEFAULT nextval('public.mst_fasilitas_id_seq'::regclass);


--
-- Name: mst_harga_sewa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_harga_sewa ALTER COLUMN id SET DEFAULT nextval('public.mst_harga_sewa_id_seq'::regclass);


--
-- Name: mst_ruangan id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_ruangan ALTER COLUMN id SET DEFAULT nextval('public.mst_ruangan_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: trx_sewa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trx_sewa ALTER COLUMN id SET DEFAULT nextval('public.trx_sewa_id_seq'::regclass);


--
-- Name: trx_sewa_fasilitas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trx_sewa_fasilitas ALTER COLUMN id SET DEFAULT nextval('public.trx_sewa_fasilitas_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: fasilitas_ruangan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fasilitas_ruangan (id, fasilitas_id, ruangan_id, is_actibe) FROM stdin;
3	10	13	t
4	11	11	t
5	12	11	t
6	13	11	t
7	14	11	t
9	16	11	t
11	4	10	t
12	14	10	t
13	5	10	t
1	11	16	t
10	20	10	t
14	11	10	t
8	20	11	t
15	15	10	t
16	21	13	t
17	20	13	t
18	4	13	t
19	5	13	t
20	15	13	t
23	20	12	t
25	15	12	t
26	5	12	t
21	22	12	t
22	4	12	t
24	10	12	t
27	21	15	t
29	5	15	t
30	4	15	t
31	20	15	t
32	14	15	t
28	11	15	t
33	11	14	t
34	5	14	t
35	21	14	t
36	15	14	t
37	10	14	t
38	20	14	t
39	4	16	t
40	20	16	t
41	14	16	t
42	15	16	t
2	21	16	t
43	4	17	t
44	20	17	t
45	14	17	t
46	15	17	t
47	11	17	t
48	10	17	t
49	4	18	t
50	20	18	t
51	14	18	t
52	15	18	t
53	11	18	t
54	10	18	t
55	5	20	t
56	21	20	t
57	15	20	t
58	11	20	t
59	10	20	t
60	22	20	t
61	5	21	t
62	21	21	t
63	15	21	t
64	11	21	t
65	23	21	t
66	24	21	t
67	5	22	t
68	21	22	t
69	11	22	t
70	15	22	t
71	24	22	t
72	10	22	t
\.


--
-- Data for Name: informasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.informasi (id, nama, deskripsi, image) FROM stdin;
6	Pasar Bahagia Vol. 02 Kembali ke Akar	Pasar Bahagia Vol. 02 Kembali ke Akar	Pasar Bahagia (1).jpg
7	Pasar Bahagia Memanggil Kreator Bahagia	Pasar Bahagia Vol. 02 Kembali ke Akar Memanggil Kreator Bahagia	Pasar Bahagia (2).jpg
8	Workshop Membuat Es Cincau dari Pekarangan Dapur	Workshop Membuat Es Cincau dari Pekarangan Dapur Bersama Wilma Chrysanti	Pasar Bahagia (3).jpg
9	Workshop Reparasi Baju Juga Lucu	Workshop Reparasi Baju Juga Lucu Bersama Velie Kurniawan	Pasar Bahagia (4).jpg
10	Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas	Workshop Ramu Pangan Sirkular: Oleh Oleh Nanas Bersama Nia Nurdiansyah	Pasar Bahagia (5).jpg
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: master_profil_customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.master_profil_customer (id, email, nama, telepon, alamat, password, password_baru, password_lama, created_at, updated_at) FROM stdin;
7	ranibilla@gmail.com	Billa Rani	081234567770	Jalan Karangasem no 11 rt 2/3	123	123	\N	2024-12-27 04:09:38	2024-12-27 15:24:27
1	syaharanibilla1@gmail.com	Billa	081234567770	Bintaro, Jakarta Selatan	123456	123456	\N	\N	2024-12-29 20:24:01
8	caro@gmail.com	caro sama	\N	\N	password	\N	\N	2025-06-28 04:23:42	2025-06-28 04:23:42
9	catur.21048@mhs.unesa.ac.id	catur hendra	\N	\N	password	\N	\N	2025-06-28 13:41:42	2025-06-28 13:41:42
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2024_04_24_081427_create_master_profil_customer_table	1
5	2024_12_23_071103_1_create_mst_ruangan	1
6	2024_12_23_072156_2_create_mst_fasilitas	1
7	2024_12_23_072629_3_create_mst_harga_sewa	1
8	2024_12_23_073123_4_create_trx_sewa_fasilitas	1
9	2024_12_23_073459_5_create_trx_sewa_	1
10	2024_12_26_081910_informasi	2
11	2024_12_26_082408_create_infomasi	3
12	2024_12_26_082621_tabel_informasi	4
\.


--
-- Data for Name: mst_fasilitas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mst_fasilitas (id, nama_fasilitas, kuantitas, deskripsi, harga_satuan, image, created_at, updated_at, is_umum) FROM stdin;
37	Sanganan 1	15	Kue Sus, Donat Gula, Lemper, Minuman Panas	450000	Sarapan.png	\N	\N	f
38	Sanganan 2	30	100 Jajan Pasar Mini (8 Macam), 1 Macam Keripik, Minuman Panas, Minuman Dingin	800000	Sarapan.png	\N	\N	f
34	Gayatri - Sundari	1	Nasi Putih, Sop, Sayuran, Olahan Ayam/Ikan, Telur Balado, Kerupuk Udang, Buah Potong (3 Macam), Teh Sereh Pandan	65000	Sarapan.png	\N	\N	f
8	Parkir Luas	1		0	fa-solid fa-car	\N	\N	t
35	Gayatri - Bhavya	1	Nasi Putih, Nasi Goreng Paon, Sop, Sayuran, Olahan Ayam/Ikan, Olahan Daging, Kerupuk Udang, Buah Potong (3 Macam), Tek Sereh Pandan	75000	Sarapan.png	\N	\N	f
11	Wifi	1	Wifi	0	fa-solid fa-wifi	\N	\N	t
12	Full Band Equipment	1	Full Band Equipment	0	fa-solid fa-music	\N	\N	t
13	Mics 1000W 32 Channels	1	Mics 1000W 32 Channels	0	fa-solid fa-microphone	\N	\N	t
14	Mixer	1	Mixer	0	fa-solid fa-sliders	\N	\N	t
10	Ruangan Terhubung	1	ruangan terhubung	0	fa-solid fa-door-open	\N	\N	t
36	Gayatri - Devi	1	Nasi Putih, Olahan Nasi/Mie, Sop, Sayuran, Olahan Ayam/Ikan, Olahan Daging, Kerupuk Udang, Buah Potong (3 Macam), Teh Sereh Pandan	85000	Sarapan.png	\N	\N	f
5	Kursi & Meja	1	Kursi & Meja	0	fa-solid fa-chair	\N	\N	t
4	Microphone	1	microphone	0	fa-solid fa-microphone	\N	\N	t
39	Sanganan 3	50	200 Jajan Pasar Mini (12 Macam), 2 Macam Keripik, Minuman Panas, Minuman Dingin	1300000	Sarapan.png	\N	\N	f
15	Kangen Water	1	Kangen Water	0	fa-solid fa-mug-saucer	\N	\N	t
22	Pemanas Teh	1	Pemanas Teh	0	fa-solid fa-mug-hot	\N	\N	t
20	Speaker	1	Speaker	0	fa-solid fa-volume-high	\N	\N	t
16	Teknisi Audio	1	Teknisi Audio	0	fa-solid fa-person	\N	\N	t
21	AC	1	AC	0	fa-solid fa-fan	\N	\N	t
24	Proyektor	1	Proyektor	0	fa-solid fa-video	\N	\N	t
23	Papan Tulis	1	Papan Tulis	0	fa-solid fa-chalkboard	\N	\N	t
1	Sarapan Pagi 1	1	Bajigur, Pisang Rebus, Singkong Goreng	25000	Sarapan.png	\N	\N	f
3	Sarapan Pagi 3	1	Risoles, Roti Bakar Manis, Teh Panas/Kopi Hitam	25000	Sarapan.png	\N	\N	f
2	Sarapan Pagi 2	1	Sekoteng/Susu Jahe, Pisang Goreng	25000	Pasar Bahagia (1).jpg	\N	\N	f
26	Mentari 1	1	Lontong Sayur, Es/Panas Teh Lemon 	30000	Sarapan.png	\N	\N	f
28	Mentari 2	1	Bubur Ayam/Kornet Sapi, Teh Panas/Kopi Susu	30000	Sarapan.png	\N	\N	f
29	Mentari 3	1	Omelet Keju, Teh Tarik/Kopi Susu	30000	Sarapan.png	\N	\N	f
31	Amboja Soto Betawi	1	Soto Betawi, Semangka, Teh Sereh Pandan	45000	Sarapan.png	\N	\N	f
32	Amboja Soto Mie Bogor	1	Soto Mie Bogor, Melon, Teh Sereh Pandan	45000	Sarapan.png	\N	\N	f
30	Amboja Soto Ayam	1	Soto Ayam, Semangka & Melon, Teh Sereh Pandan	45000	Sarapan.png	\N	\N	f
33	Gayatri - Prasaja	1	Nasi Putih, Sop, Sayuran, Olahan Ayam/Ikan, Kerupuk Udang, Semangka, Puding, Teh Sereh Pandan	55000	Sarapan.png	\N	\N	f
\.


--
-- Data for Name: mst_harga_sewa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mst_harga_sewa (id, ruangan_id, durasi, harga, created_at, updated_at) FROM stdin;
1	15	1	300000	\N	\N
2	16	1	700000	\N	\N
3	17	1	900000	\N	\N
4	14	1	200000	\N	\N
5	13	1	400000	\N	\N
6	11	1	700000	\N	\N
7	10	1	500000	\N	\N
8	12	1	300000	\N	\N
9	18	1	150000	\N	\N
10	20	1	100000	\N	\N
11	21	1	200000	\N	\N
12	22	1	150000	\N	\N
\.


--
-- Data for Name: mst_ruangan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mst_ruangan (id, nama_ruangan, kapasitas, lokasi, panjang_ruangan, lebar_ruangan, deskripsi, image, harga, created_at, updated_at, tags, active, order_id, diskon) FROM stdin;
15	Karya	25	Lantai 2	10	15	Karya bermakna hasil atau buah dari pekerjaan. Ruang Karya merupakan tempat \n                untuk menghasilkan dan menampilkan buah pekerjaan. Karya dirancang untuk \n                kegiatan lokakarya, dialog, talkshow, pameran karya, hingga pemutaran film.	Karya.jpg	300000	\N	\N	\N	t	2	0
16	Arupadatu	50	Lantai 3	10	15	Arupadhatu bermakna alam tertinggi, alam atas, atau nirwana, tempat dimana \n                manusia terbebas dari keterikatan manusiawinya. Ruang Arupadhatu \n                diharapkan menjadi tempat bagi setiap orang untuk berproses menjadi manusia \n                yang lebih baik. Arupadhatu dirancang untuk berbagai kegiatan, seperti seminar, \n                pameran, lokakarya, pemutaran film, office and community gathering, hingga \n                acara-acara keluarga seperti ulang tahun dan reuni.	Arupadatu.jpg	700000	\N	\N	\N	t	2	0
17	Nirmana	80	Lantai 3	10	15	Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana \n                menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. \n                Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal \n                maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.	Nirmana.jpg	900000	\N	\N	\N	t	3	0
14	Pranata	8	Lantai 2	10	15	Panata bermakna penata atau aturan. Orang-orang yang bekerja di ruang ini \n                diharapkan mampu menjadi penata bagi dirinya dan sesama. Ruang Panata \n                dirancang menjadi kantor atau tempat bekerja bagi organisasi ataupun komunitas.	Panata.jpg	200000	\N	\N	meeting,Birthday Party	t	3	0
13	Bramara	30	Lantai 1	10	15	Bramara bermakna lebah. Lebah memiliki karakteristik pekerja keras, tulus, \n                mandiri, dan bermanfaat bagi sesama. Bramara dirancang untuk kegiatan \n                seminar, webinar, lokakarya, workshop, dan pameran. Namun Bramara juga\n                dapat digunakan untuk acara keluarga, seperti ulang tahun dan reuni.	Bramara.jpg	400000	\N	\N	\N	t	1	0
11	Sangita	15	Lantai 1	10	15	Sangita bermakna musik. Sangita adalah studio musik tempat para pemusik \n                mengekspresikan diri. Sangita dapat digunakan untuk latihan musik, rekaman, \n                dan podcast. Ketika dipadukan bersama Ruang Plataran, Sangita \n                bertransformasi menjadi panggung pertunjukan musik untuk berbagai acara kumpul keluarga dan bisnis.	Sangita.jpg	700000	\N	\N	meeting	t	1	0
10	Plataran	100	Lantai 1	10	15	Plataran artinya serambi atau halaman rumah. \n                Plataran merupakan ruang terbuka (outdoor) yang hijau dan sejuk, \n                berlokasi di halaman Rumah Anindhaloka. Plataran sangat sesuai untuk \n                kegiatan kumpul keluarga, komunitas, maupun bisnis, seperti ulang tahun, \n                peluncuran produk, pertunjukan musik, dan office gathering.	Plataran.jpg	500000	\N	\N	meeting,birtday party;	t	1	0
12	Nirnaya	20	Lantai 1	10	15	Nirnaya bermakna pengetahuan. Nirnaya merupakan ruang terbuka (outdoor) \n                sejuk dan tenang, diharapkan menjadi tempat lahirnya ide-ide cemerlang dan \n                kreatif. Nirnaya dirancang sebagai tempat bertukar fikiran dan berdiskusi yang \n                nyaman dalam bentuk talk show, dialog, atau rapat kecil yang rileks. Dipadu \n                dengan Bramara, Nirnaya menjadi ruang makan yang akrab.	Nirnaya.jpg	300000	\N	\N	\N	t	2	0
18	Nirwana	15	Lantai 3	10	15	Nirmana bermakna tidak berbentuk atau tidak bermakna. Ruang Nirmana \n                menjadi tempat menghadirkan berbagai komposisi bentuk sehingga menjadi bermakna. \n                Ruang Nirmana merupakan area outdoor yang dirancang untuk beragam aktivitas, baik formal \n                maupun informal, seperti gathering, perayaan, latihan seni tari atau senam.	Nirwana.jpg	150000	\N	\N	\N	t	3	0
21	Kumpul	10	Lantai 2	10	15	Kumpul berarti berkumpul bersama. Ruang kumpul merupakan ruang untuk\nberdiskusi, berdialog untuk menghasilkan ide dan keputusan cemerlang. Ruang\nkumpul dirancang untuk memenuhi kebutuhan rapat, baik bagi bisnis maupun\nkomunitas.	Kumpul.png	200000	\N	\N	\N	t	4	0
22	Karsa	6	Lantai 2	10	15	Karsa bermakna niat dan kemauan kuat. Ruang Karsa diharapkan mampu\nmemperteguh niat baik dan kemauan untuk mencapainya. Ruang Karsa\ndirancang menjadi ruang kantor dan kerja bagi komunitas dan organisasi.	Karsa.png	150000	\N	\N	\N	t	5	0
25	cek	10	disana	3	4	ghjkjhg	C:\\laragon\\www\\roombooking\\public\\front/image/ruangan\\phpFBBC.tmp	60000	2025-06-28 04:30:50	2025-06-28 04:30:50	\N	\N	\N	0
26	cek	10	disana	3	4	okeh	C:\\laragon\\www\\roombooking\\public\\front/image/ruangan\\php9579.tmp	60000	2025-06-28 08:18:40	2025-06-28 08:18:40	\N	\N	\N	0
27	cek	10	disana	3	4	okeh	C:\\laragon\\www\\roombooking\\public\\front/image/ruangan\\phpA2C2.tmp	60000	2025-06-28 08:24:11	2025-06-28 08:24:11	\N	\N	\N	0
28	cek	10	disana	3	4	okeh	C:\\laragon\\www\\roombooking\\public\\front/image/ruangan\\1751099127_tas2.jpeg	60000	2025-06-28 08:25:27	2025-06-28 08:25:27	\N	\N	\N	0
29	cek	10	disana	3	4	okeh	C:\\laragon\\www\\roombooking\\public\\front/image/ruangan\\1751099180_tas2.jpeg	60000	2025-06-28 08:26:20	2025-06-28 08:26:20	\N	\N	\N	10
30	cek	10	disana	3	4	okeh	front/image/ruangan/1751099255_tas2.jpeg	60000	2025-06-28 08:27:35	2025-06-28 08:27:35	\N	\N	\N	10
32	cek2	30	alsad	4	5	hjsagdjsakd	1751099841_tas2.jpeg	90000	2025-06-28 08:37:21	2025-06-28 08:37:37	\N	t	\N	13
31	cek	10	disana	3	4	jiir	1751099651_tas1.jpeg	60000	2025-06-28 08:34:11	2025-06-28 08:39:08	\N	f	\N	10
33	ruangan b	10	dsf	5	5	kksdf	1751119332_4ou0e2gj.png	200000	2025-06-28 14:02:12	2025-06-28 14:02:12	\N	t	\N	20
20	Agawe	16	Lantai 2	10	15	Agawe bermakna membawa atau mendatangkan. Ruang Agawe diharapkan\r\nmembawa kesejahteraan bagi mereka yang bekerja disana dan sesamanya.\r\nAgawe merupakan coworking space, terdiri dari 4 islands yang bisa menjadi\r\ntempat bekerja bersama.	Agawe.png	100000	\N	2025-06-28 14:02:32	\N	t	3	5
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, order_num, tgl_order, ordered_by, order_for) FROM stdin;
2	dwqd	\N	Pengguna 1	\N
3	wdqddq	\N	Pengguna 3	\N
4	gdsdgs	\N	Pengguna 2	\N
5	fdgdfg	\N	Pengguna 4	\N
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
vPzPDFVeJsKFpcUrwbcF3ixXAKVoNWzgkReOA2Tl	16	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0	YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUGY2UldEVkxxeHVpMGl0Y3pCbzFRSTliZ2c1YWRQZ0kwWmZNMzBOZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi90cmFuc2Frc2lGYXNpbGl0YXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9	1751119666
3obQtMveRI6XYX83DVisrPzz2q3GkytijckIXvm7	17	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0	YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNU9hWDRzRXBITmhmU3VkV2lvZFVpU0Naa0cxN25SZnlNMEZ4NFVnSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZXNhbjIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNztzOjY6InBlc2FuMiI7YTo0OntzOjc6InJ1YW5nYW4iO2E6Mjp7aTowO2E6Mzp7czoyOiJpZCI7czoyOiIzMiI7czo0OiJuYW1hIjtzOjQ6ImNlazIiO3M6NToiaGFyZ2EiO2k6NzgzMDA7fWk6MTthOjM6e3M6MjoiaWQiO3M6MjoiMzMiO3M6NDoibmFtYSI7czo5OiJydWFuZ2FuIGIiO3M6NToiaGFyZ2EiO2k6MTYwMDAwO319czoxMjoiaXRlbVRhbWJhaGFuIjthOjI6e2k6MDthOjQ6e3M6MjoiaWQiO3M6MjoiMjYiO3M6NDoibmFtYSI7czo5OiJNZW50YXJpIDEiO3M6NjoianVtbGFoIjtpOjE7czo4OiJzdWJ0b3RhbCI7aTozMDAwMDt9aToxO2E6NDp7czoyOiJpZCI7czoyOiIzNyI7czo0OiJuYW1hIjtzOjEwOiJTYW5nYW5hbiAxIjtzOjY6Imp1bWxhaCI7aToxO3M6ODoic3VidG90YWwiO2k6NDUwMDAwO319czoxMDoidG90YWxIYXJnYSI7aTo3MTgzMDA7czo3OiJwZXNhbmFuIjthOjM6e3M6MjoiaWQiO3M6MjoiMzIiO3M6NDoibmFtYSI7czo0OiJjZWsyIjtzOjU6ImhhcmdhIjtpOjc4MzAwO319czo2OiJwZXNhbjMiO2E6NTp7czo4OiJydWFuZ2FucyI7YToyOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjMyIjtzOjQ6Im5hbWEiO3M6NDoiY2VrMiI7czo1OiJoYXJnYSI7aTo3ODMwMDtzOjg6InN1YnRvdGFsIjtpOjMxMzIwMDt9aToxO2E6NDp7czoyOiJpZCI7czoyOiIzMyI7czo0OiJuYW1hIjtzOjk6InJ1YW5nYW4gYiI7czo1OiJoYXJnYSI7aToxNjAwMDA7czo4OiJzdWJ0b3RhbCI7aTo2NDAwMDA7fX1zOjk6InRhbWJhaGFucyI7YToyOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjI2IjtzOjQ6Im5hbWEiO3M6OToiTWVudGFyaSAxIjtzOjY6Imp1bWxhaCI7aToxO3M6ODoic3VidG90YWwiO2k6MzAwMDA7fWk6MTthOjQ6e3M6MjoiaWQiO3M6MjoiMzciO3M6NDoibmFtYSI7czoxMDoiU2FuZ2FuYW4gMSI7czo2OiJqdW1sYWgiO2k6MTtzOjg6InN1YnRvdGFsIjtpOjQ1MDAwMDt9fXM6OToidGdsX211bGFpIjtzOjE2OiIyMDI1LTAxLTA0IDAxOjAwIjtzOjExOiJ0Z2xfc2VsZXNhaSI7czoxNjoiMjAyNS0wMS0wNCAwNDowMSI7czoxMDoidG90YWxIYXJnYSI7aToxNDMzMjAwO31zOjY6InBlc2FuNCI7YTo3OntzOjg6InJ1YW5nYW5zIjthOjI6e2k6MDthOjQ6e3M6MjoiaWQiO3M6MjoiMzIiO3M6NDoibmFtYSI7czo0OiJjZWsyIjtzOjU6ImhhcmdhIjtpOjc4MzAwO3M6ODoic3VidG90YWwiO2k6MzEzMjAwO31pOjE7YTo0OntzOjI6ImlkIjtzOjI6IjMzIjtzOjQ6Im5hbWEiO3M6OToicnVhbmdhbiBiIjtzOjU6ImhhcmdhIjtpOjE2MDAwMDtzOjg6InN1YnRvdGFsIjtpOjY0MDAwMDt9fXM6OToidGFtYmFoYW5zIjthOjI6e2k6MDthOjQ6e3M6MjoiaWQiO3M6MjoiMjYiO3M6NDoibmFtYSI7czo5OiJNZW50YXJpIDEiO3M6NjoianVtbGFoIjtpOjE7czo4OiJzdWJ0b3RhbCI7aTozMDAwMDt9aToxO2E6NDp7czoyOiJpZCI7czoyOiIzNyI7czo0OiJuYW1hIjtzOjEwOiJTYW5nYW5hbiAxIjtzOjY6Imp1bWxhaCI7aToxO3M6ODoic3VidG90YWwiO2k6NDUwMDAwO319czo5OiJ0Z2xfbXVsYWkiO3M6MTY6IjIwMjUtMDEtMDQgMDE6MDAiO3M6MTE6InRnbF9zZWxlc2FpIjtzOjE2OiIyMDI1LTAxLTA0IDA0OjAxIjtzOjEwOiJ0b3RhbEhhcmdhIjtpOjE0MzMyMDA7czo1OiJub3RlcyI7czo3OiJoYWFhYWFpIjtzOjQ6ImtvZGUiO3M6MjE6IlRSWDIwMjUwNjI4MTQwNTI5MjE4NCI7fXM6ODoidHJhbnNmZXIiO2E6ODp7czo4OiJydWFuZ2FucyI7YToyOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjMyIjtzOjQ6Im5hbWEiO3M6NDoiY2VrMiI7czo1OiJoYXJnYSI7aTo3ODMwMDtzOjg6InN1YnRvdGFsIjtpOjMxMzIwMDt9aToxO2E6NDp7czoyOiJpZCI7czoyOiIzMyI7czo0OiJuYW1hIjtzOjk6InJ1YW5nYW4gYiI7czo1OiJoYXJnYSI7aToxNjAwMDA7czo4OiJzdWJ0b3RhbCI7aTo2NDAwMDA7fX1zOjk6InRhbWJhaGFucyI7YToyOntpOjA7YTo0OntzOjI6ImlkIjtzOjI6IjI2IjtzOjQ6Im5hbWEiO3M6OToiTWVudGFyaSAxIjtzOjY6Imp1bWxhaCI7aToxO3M6ODoic3VidG90YWwiO2k6MzAwMDA7fWk6MTthOjQ6e3M6MjoiaWQiO3M6MjoiMzciO3M6NDoibmFtYSI7czoxMDoiU2FuZ2FuYW4gMSI7czo2OiJqdW1sYWgiO2k6MTtzOjg6InN1YnRvdGFsIjtpOjQ1MDAwMDt9fXM6OToidGdsX211bGFpIjtzOjE2OiIyMDI1LTAxLTA0IDAxOjAwIjtzOjExOiJ0Z2xfc2VsZXNhaSI7czoxNjoiMjAyNS0wMS0wNCAwNDowMSI7czoxMDoidG90YWxIYXJnYSI7aToxNDMzMjAwO3M6NToibm90ZXMiO3M6NzoiaGFhYWFhaSI7czo0OiJrb2RlIjtzOjIxOiJUUlgyMDI1MDYyODE0MDUyOTIxODQiO3M6MTI6Im1ldG9kZV9iYXlhciI7czo4OiJtaWR0cmFucyI7fX0=	1751119611
EAFdTCbg7N7iUqXnYsJMwjimAFJY5AlIxLqrxgiz	16	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0	YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWZiR0JaUTc1VlhpOHhVR3JyT1hWenpKYXBDTDlpa05aMGkzQWFoTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi90cmFuc2Frc2lGYXNpbGl0YXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9	1751118982
\.


--
-- Data for Name: trx_sewa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.trx_sewa (id, mst_ruangan_id, mst_harga_sewa_id, mst_profil_id, tanggal_awal, tanggal_akhir, keperluan, diskon, deskripsi, created_at, updated_at, order_id, kode_transaksi, status) FROM stdin;
67	12	1134900	16	2025-02-02 01:00:00	2025-02-02 03:01:00	yoi brooh	0	\N	2025-06-28 11:19:20	2025-06-28 11:20:12	\N	TRX202506281119207818                                                                                                                                                                                                                                          	1
68	32	1134900	16	2025-02-02 01:00:00	2025-02-02 03:01:00	yoi brooh	13	\N	2025-06-28 11:19:20	2025-06-28 11:20:12	\N	TRX202506281119207818                                                                                                                                                                                                                                          	1
69	12	806600	16	2025-01-02 01:00:00	2025-01-02 03:00:00	ini kedua	0	\N	2025-06-28 12:39:18	2025-06-28 12:39:18	\N	TRX202506281239183261                                                                                                                                                                                                                                          	0
70	32	806600	16	2025-01-02 01:00:00	2025-01-02 03:00:00	ini kedua	13	\N	2025-06-28 12:39:18	2025-06-28 12:39:18	\N	TRX202506281239183261                                                                                                                                                                                                                                          	0
71	15	831600	17	2025-01-01 01:00:00	2025-01-01 02:01:00	ini adalah pesanan	0	\N	2025-06-28 13:43:20	2025-06-28 13:44:53	\N	TRX202506281343207180                                                                                                                                                                                                                                          	1
72	32	831600	17	2025-01-01 01:00:00	2025-01-01 02:01:00	ini adalah pesanan	13	\N	2025-06-28 13:43:20	2025-06-28 13:44:53	\N	TRX202506281343207180                                                                                                                                                                                                                                          	1
73	32	1433200	17	2025-01-04 01:00:00	2025-01-04 04:01:00	haaaaai	13	\N	2025-06-28 14:05:30	2025-06-28 14:06:51	\N	TRX202506281405292184                                                                                                                                                                                                                                          	1
74	33	1433200	17	2025-01-04 01:00:00	2025-01-04 04:01:00	haaaaai	20	\N	2025-06-28 14:05:30	2025-06-28 14:06:51	\N	TRX202506281405292184                                                                                                                                                                                                                                          	1
\.


--
-- Data for Name: trx_sewa_fasilitas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.trx_sewa_fasilitas (id, trx_sewa_id, mst_fasilitas_id, kuantitas, satuan, created_at, updated_at) FROM stdin;
46	70	1	1	0	2025-06-28 12:39:18	2025-06-28 12:39:18
47	70	2	1	0	2025-06-28 12:39:18	2025-06-28 12:39:18
48	72	26	1	0	2025-06-28 13:43:20	2025-06-28 13:43:20
49	72	30	1	0	2025-06-28 13:43:20	2025-06-28 13:43:20
50	74	26	1	0	2025-06-28 14:05:30	2025-06-28 14:05:30
51	74	37	1	0	2025-06-28 14:05:30	2025-06-28 14:05:30
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, email, name, email_verified_at, password, status, remember_token, created_at, updated_at, role) FROM stdin;
15	ranibilla@gmail.com	\N	\N	$2y$12$R6kcFTmFlHdH67yeVWZlqO9Z3CN6PmBuAaqzfUBNB4lRGPzIlgIuW	t	\N	\N	2024-12-27 15:24:46	2
1	syaharanibilla1@gmail.com	\N	2024-12-26 07:31:38	$2y$12$u8C9hqPgnT0QOXWl04nG2ernN.J15/aEh54fC2SfKKkyLcKXLgzru	t	z4ljJSTHyPxFcZgrRY4SR23BC9mf5aMIA9cqKhiTbHXigNeYjosEl6TF0wTA	2024-12-26 07:31:38	2025-06-21 09:31:27	2
16	caro@gmail.com	\N	\N	$2y$12$SFybf6kNvYwZte8Vssy5tOeaLCk6mB.LxEMo1CrSs0VQU2qfN20KC	t	\N	\N	\N	1
17	catur.21048@mhs.unesa.ac.id	\N	\N	$2y$12$Qn8y70iQcVSEnDg2CvhJhuYldzQDikp6snSgqfMKhzW7Q.wXXXxkK	t	\N	\N	\N	2
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: fasilitas_ruangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fasilitas_ruangan_id_seq', 72, true);


--
-- Name: informasi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.informasi_id_seq', 10, true);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: master_profil_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_profil_customer_id_seq', 9, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);


--
-- Name: mst_fasilitas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mst_fasilitas_id_seq', 39, true);


--
-- Name: mst_harga_sewa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mst_harga_sewa_id_seq', 12, true);


--
-- Name: mst_ruangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mst_ruangan_id_seq', 33, true);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 5, true);


--
-- Name: trx_sewa_fasilitas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.trx_sewa_fasilitas_id_seq', 51, true);


--
-- Name: trx_sewa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.trx_sewa_id_seq', 74, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 17, true);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: fasilitas_ruangan fasilitas_ruangan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT fasilitas_ruangan_pkey PRIMARY KEY (id);


--
-- Name: informasi informasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.informasi
    ADD CONSTRAINT informasi_pkey PRIMARY KEY (id);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: master_profil_customer master_profil_customer_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_profil_customer
    ADD CONSTRAINT master_profil_customer_email_unique UNIQUE (email);


--
-- Name: master_profil_customer master_profil_customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_profil_customer
    ADD CONSTRAINT master_profil_customer_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: mst_fasilitas mst_fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_fasilitas
    ADD CONSTRAINT mst_fasilitas_pkey PRIMARY KEY (id);


--
-- Name: mst_harga_sewa mst_harga_sewa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_harga_sewa
    ADD CONSTRAINT mst_harga_sewa_pkey PRIMARY KEY (id);


--
-- Name: mst_ruangan mst_ruangan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mst_ruangan
    ADD CONSTRAINT mst_ruangan_pkey PRIMARY KEY (id);


--
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: trx_sewa_fasilitas trx_sewa_fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trx_sewa_fasilitas
    ADD CONSTRAINT trx_sewa_fasilitas_pkey PRIMARY KEY (id);


--
-- Name: trx_sewa trx_sewa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trx_sewa
    ADD CONSTRAINT trx_sewa_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: fasilitas_ruangan fasilitas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT fasilitas_fk FOREIGN KEY (fasilitas_id) REFERENCES public.mst_fasilitas(id);


--
-- Name: fasilitas_ruangan ruangan_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas_ruangan
    ADD CONSTRAINT ruangan_fk FOREIGN KEY (ruangan_id) REFERENCES public.mst_ruangan(id);


--
-- PostgreSQL database dump complete
--


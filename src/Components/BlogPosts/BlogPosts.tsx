import styles from './BlogPosts.module.scss';
import {robotoMono} from "@/common/fonts";
import type {FC} from "react";
import {BlogPost, blogs} from "@/Components/BlogPosts/Blogs";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faQuoteLeft, faQuoteRight} from '@fortawesome/free-solid-svg-icons'

const BlogPost: FC<BlogPost> = ({url, source,title, paragraph, date}) => <div className={styles.blog}>
    <div className={styles.top}>
        <span className={`${styles.title} ${robotoMono.className}`}><a href={url} target={'_blank'}>{title}</a></span>
        <div className={styles.metadata}>
            <span className={styles.source}>{source}, </span>
            <span className={styles.date}>{date}</span>
        </div>
    </div>
    <div className={styles.paragraphWrapper}>
        <FontAwesomeIcon icon={faQuoteLeft} className={`${styles.quote} ${styles.left}`} />
        <p>{paragraph}</p>
        <FontAwesomeIcon icon={faQuoteRight} className={`${styles.quote} ${styles.right}`} />
    </div>
</div>

export const BlogPosts = () => <div className={styles.blogsPostsWrapper}>
    <div className={`${styles.blogs} ${robotoMono.className}`}>
        <h2>Blog posts</h2>

        <div className={styles.blogsWrapper}>
            {blogs.map((blog, index) => <BlogPost key={index} {...blog} />)}
        </div>
    </div>
</div>

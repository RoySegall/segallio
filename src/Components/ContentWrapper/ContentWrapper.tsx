import styles from "./contentWrapper.module.scss";
import type {FC, ReactNode} from "react";

export const ContentWrapper: FC<{children: ReactNode}> = ({children}) => <div className={styles.contentWrapper}>
    {children}
</div>;

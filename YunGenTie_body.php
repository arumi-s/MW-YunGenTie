<?php

class YunGenTie {

	static public function autoAppend( OutputPage &$out, &$text ) {
		global $wgYunGenTieEnabled, $wgYunGenTieNamespaces;
		if ( $wgYunGenTieEnabled == false || empty( $wgYunGenTieNamespaces ) ) return true;

		$title = $out->getTitle();
		$ns = $title->getNamespace();

		if( !$title->exists() || $title->isSpecialPage() || $title->isMainPage() ||
			!$title->canTalk() || $title->isTalkPage() ||
			( is_null( $out->getRevisionId() ) && !$out->isArticle() ) ||
			in_array( $ns, array( NS_CATEGORY, NS_IMAGE ) ) ||
			!in_array( $ns, $wgYunGenTieNamespaces ) ||
			$out->isPrintable() ||
			$out->getRequest()->getVal('action', 'view') != 'view'
		) return true;

		global $wgYunGenTieClassName, $wgYunGenTieProductKey, $wgYunGenTieLoaderKey;
		if ( !is_string( $wgYunGenTieClassName ) ||
			!is_string( $wgYunGenTieProductKey ) ||
			!is_string( $wgYunGenTieLoaderKey )
		) return true;

		$text .=
			Html::element(
				'h2',
				array( 'class' => 'ExtYunGenTie' ),
				wfMessage( 'yungentie-header' )->numParams( $title->getPrefixedText() )->inContentLanguage()->parse()
			) .
			Html::element(
				'div',
				array( 'id' => $wgYunGenTieClassName, 'class' => $wgYunGenTieClassName )
			);
		$out->addScript( '<script src="https://img1.ws.126.net/f2e/tie/yun/sdk/loader.js"></script>' );
		$out->addInlineScript(
			'var cloudTieConfig = '.
				json_encode( array(
					'sourceId' => (string)$title->getArticleID(),
					'productKey' => $wgYunGenTieProductKey,
					'target' => $wgYunGenTieClassName,
				) ) .
			';var yunManualLoad = true;'.
			'Tie.loader(' . json_encode( $wgYunGenTieLoaderKey ) . ', true);'
		);
		return true;
	}

}

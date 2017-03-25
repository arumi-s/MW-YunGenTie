<?php

class ApiTie extends ApiBase {

	public function execute() {
		$api = trim( $this->getMain()->getVal( 'api' , '' ) );
		$user = User::newFromSession( $this->getRequest() );

		if ( $user->isAnon() || $user->isBlocked() ) {
			$this->getResult()->addValue( null, 'isLogin', 0 );
		} else {
			global $wgUploadPath, $wgLogo;
			$id = $user->getId();
			$name = $user->getRealName();
			if ( $name == '' ) $name = $user->getName();
			if ( class_exists( 'wAvatar' ) ) {
				$avatar = new wAvatar( $id, 'l' );
				$avatar = $wgUploadPath . '/avatars/' . $avatar->getAvatarImage();
			} else {
				$avatar = $wgLogo;
			}

			$this->getResult()->addValue( null, 'userId', (string)$id );
			$this->getResult()->addValue( null, 'isLogin', 1 );
			$this->getResult()->addValue( null, 'avatar', $avatar );
			$this->getResult()->addValue( null, 'nickName', $name );
		}

		return true;
	}

	public function getAllowedParams() {
		return array(
			'api' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false,
			),
			'callback' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'_' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false,
			),
		);
	}

}
